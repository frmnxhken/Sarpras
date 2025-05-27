<?php

namespace App\Http\Controllers;

use App\Models\AjuanMutasi;
use App\Models\AjuanPeminjaman;
use App\Models\AjuanPengadaan;
use App\Models\AjuanPenghapusan;
use App\Models\AjuanPerawatan;
use App\Models\Barang;
use App\Models\Mutasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AjuanController extends Controller
{
    public function index()
    {
        $peminjaman = AjuanPeminjaman::with(['user', 'peminjaman.barang.ruangan'])->whereIn('status', ['pending', 'ditolak'])->get();
        $pengadaan = AjuanPengadaan::with((['user', 'barang.ruangan']))->whereIn('status', ['pending', 'ditolak'])->get();
        $perawatan = AjuanPerawatan::with((['user', 'perawatan.barang.ruangan']))->whereIn('status', ['pending', 'ditolak'])->get();
        $mutasi = AjuanMutasi::with((['user', 'mutasi.barang.ruangan']))->whereIn('status', ['pending', 'ditolak'])->get();
        $penghapusan = AjuanPenghapusan::with((['user', 'penghapusan.barang.ruangan']))->whereIn('status', ['pending', 'ditolak'])->get();

        $dataAjuan = collect();

        foreach ($peminjaman as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'peminjaman',
                'created_at' => $item->created_at->format('Y-m-d'),
                'jenis' => 'Peminjaman',
                'pengaju' => $item->user->name ?? '-',
                'barang' => $item->peminjaman->barang->nama_barang ?? '-',
                'jumlah' => $item->peminjaman->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->peminjaman->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => $item->peminjaman->keterangan ?? '-',
            ]);
        }

        foreach ($pengadaan as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'pengadaan',
                'created_at' => $item->created_at->format('Y-m-d'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Pengadaan',
                'barang' => $item->barang->nama_barang ?? '-',
                'jumlah' => $item->barang->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => '-',
            ]);
        }

        foreach ($perawatan as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'perawatan',
                'created_at' => $item->created_at->format('Y-m-d'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Perawatan',
                'barang' => $item->perawatan->barang->nama_barang ?? '-',
                'jumlah' => $item->perawatan->jumlah ?? '-',
                'status' => $item->status,
                'ruangan' => $item->perawatan->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => $item->perawatan->keterangan ?? '-',
            ]);
        }

        foreach ($penghapusan as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'penghapusan',
                'created_at' => $item->created_at->format('Y-m-d'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Penghapusan',
                'barang' => $item->penghapusan->barang->nama_barang ?? '-',
                'jumlah' => $item->penghapusan->jumlah ?? '-',
                'status' => $item->status,
                'ruangan' => $item->penghapusan->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => $item->penghapusan->keterangan ?? '-',
            ]);
        }

        foreach ($mutasi as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'mutasi',
                'created_at' => $item->created_at->format('Y-m-d'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Mutasi',
                'barang' => $item->mutasi->barang->nama_barang ?? '-',
                'jumlah' => $item->mutasi->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->mutasi->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => $item->mutasi->keterangan ?? '-',
            ]);
        }
        $dataAjuan = $dataAjuan
            // ->where('status', 'pending')
            ->sortByDesc('created_at')->values();


        return view('ajuan.app', compact('dataAjuan'));
    }

    public function UpdateStatus($type, $id, $status)
    {
        if ($type === 'peminjaman') {
            $ajuan = AjuanPeminjaman::find($id);
            if ($status === 'Disetujui'){
                $peminjaman = $ajuan->peminjaman;
                $barang = Barang::findOrFail($peminjaman->barang_id);
                if ($peminjaman->jumlah_barang > $barang->jumlah_barang) {
                    return back()->withErrors(['jumlah_barang' => 'Jumlah barang yang diminta melebihi stok tersedia.'])->withInput();
                }
                $barang->jumlah_barang -= $peminjaman->jumlah_barang;
                $barang->save();
            }
        } elseif ($type === 'pengadaan') {
            $ajuan = AjuanPengadaan::find($id);
            
        } elseif ($type === 'perawatan') {
            $ajuan = AjuanPerawatan::find($id);
            if ($status === 'Disetujui'){
                $barang = Barang::findOrFail($ajuan->perawatan->barang_id);
                if ($barang->jumlah_barang < $ajuan->perawatan->jumlah) {
                    return redirect()->back()->with('error', 'Jumlah barang tidak mencukupi untuk perawatan.');
                }else {
                    $barang->jumlah_barang -= $ajuan->perawatan->jumlah;
                    $barang->save();
                }
            }

        } elseif ($type === 'mutasi') {
            $ajuan = AjuanMutasi::find($id);
            if ($status === 'Disetujui'){
                $mutasi_id = $ajuan->mutasi;
                $mutasi = Mutasi::findOrFail($mutasi_id->id);
    
                $barangAsal = Barang::findOrFail($mutasi->barang_id);
                if ($mutasi->jumlah_barang > $barangAsal->jumlah_barang && $status === 'Disetujui') {
                    return redirect()->back()->with('error', 'Jumlah barang yang diminta melebihi stok tersedia.');
                }
                $barangAsal->jumlah_barang -= $mutasi->jumlah_barang;
                $barangAsal->save();
    
                $barangTujuan = Barang::where('nama_barang', $barangAsal->nama_barang)
                    ->where('ruangan_id', $mutasi->tujuan)
                    ->where('merk_barang', $barangAsal->merk_barang)
                    ->where('kondisi_barang', $barangAsal->kondisi_barang)
                    ->first();
                if ($barangTujuan) {
                    $barangTujuan->jumlah_barang += $mutasi->jumlah_barang;
                    $barangTujuan->save();
                } else {
                    Barang::create([
                        'kode_barang' => 'BRG-' . strtoupper(Str::random(6)),
                        'kode_asal' => $barangAsal->kode_barang,
                        'nama_barang' => $barangAsal->nama_barang,
                        'jenis_barang' => $barangAsal->jenis_barang,
                        'merk_barang' => $barangAsal->merk_barang,
                        'tahun_perolehan' => $barangAsal->tahun_perolehan,
                        'sumber_dana' => $barangAsal->sumber_dana,
                        'harga_perolehan' => $barangAsal->harga_perolehan,
                        'cv_pengadaan' => $barangAsal->cv_pengadaan,
                        'jumlah_barang' => $mutasi->jumlah_barang,
                        'ruangan_id' => $mutasi->tujuan,
                        'kondisi_barang' => $barangAsal->kondisi_barang,
                        'kepemilikan_barang' => $barangAsal->kepemilikan_barang,
                        'penanggung_jawab' => $barangAsal->penanggung_jawab,
                        'gambar_barang' => $barangAsal->gambar_barang,
                    ]);
                }
            }
        } elseif ($type === 'penghapusan') {
            $ajuan = AjuanPenghapusan::find($id);
            if ($status === 'Disetujui'){
                $barang = Barang::findOrFail($ajuan->penghapusan->barang_id);
                $barang->jumlah_barang -= $ajuan->penghapusan->jumlah;
                $barang->save();
            }
        } else {
            return redirect()->back()->with('error', 'Jenis ajuan tidak valid.');
        }

        if (!$ajuan) {
            return redirect()->back()->with('error', 'Data ajuan tidak ditemukan.');
        }

        $ajuan->status = $status;
        $ajuan->save();

        return redirect()->back()->with('success', 'Status ajuan berhasil diperbarui.');
    }
}
