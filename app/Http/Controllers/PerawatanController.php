<?php

namespace App\Http\Controllers;

use App\Models\AjuanPerawatan;
use App\Models\Barang;
use App\Models\Perawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PerawatanController extends Controller
{
    public function index()
    {
        $barang = Barang::with('ruangan')->get();
        $dataPerawatan = Perawatan::with('barang.ruangan', 'ajuan')->where('status', 'belum')->get();
        return view('perawatan.app', compact('dataPerawatan', 'barang'));
    }
    public function UpdateStatus(Request $request, $id)
    {
        $perawatan = Perawatan::with('barang')->find($id);
        $validated = $request->validate([
            'kondisi_barang' => 'required|in:baik,rusak,berat',
            'status' => 'nullable|string',
        ]);
        $barang = Barang::findOrFail($perawatan->barang_id);
        $barangTujuan = Barang::where('nama_barang', $barang->nama_barang)
        ->where('ruangan_id', $barang->ruangan_id)
        ->where('merk_barang', $barang->merk_barang)
        ->first();

        if ($barangTujuan->kondisi_barang === $validated['kondisi_barang'] || $barangTujuan->jumlah_barang == 0) {
            $barangTujuan->jumlah_barang += $perawatan->jumlah;
            $barang->update($validated);
            $barangTujuan->save();
        } else {
            Barang::create([
                'kode_barang' => 'BRG-' . strtoupper(Str::random(6)),
                'kode_asal' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'jenis_barang' => $barang->jenis_barang,
                'merk_barang' => $barang->merk_barang,
                'tahun_perolehan' => $barang->tahun_perolehan,
                'sumber_dana' => $barang->sumber_dana,
                'harga_perolehan' => $barang->harga_perolehan,
                'cv_pengadaan' => $barang->cv_pengadaan,
                'jumlah_barang' => $perawatan->jumlah,
                'ruangan_id' => $barang->ruangan_id,
                'kondisi_barang' => $validated['kondisi_barang'],
                'kepemilikan_barang' => $barang->kepemilikan_barang,
                'penanggung_jawab' => $barang->penanggung_jawab,
                'gambar_barang' => $barang->gambar_barang,
            ]);
        }

        if ($perawatan) {
            $perawatan->status = $validated['status'];
            $perawatan->save();
            return redirect()->back();
        }
        return response()->json(['success' => false]);
        redirect()->back();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_perawatan' => 'required|date',
            'barang_id' => 'required|exists:barangs,id',
            'jenis_perawatan' => 'required|string|max:255',
            'biaya_perawatan' => 'nullable|integer|min:0',
            'jumlah' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $perawatan = Perawatan::create($validated);
        AjuanPerawatan::create([
            'user_id' => Auth::user()->id,
            // 'user_id' => 1,
            'perawatan_id' => $perawatan->id,
        ]);

        return redirect()->back()->with('success', 'Data perawatan berhasil disimpan.');
    }

    public function laporan()
    {
        $dataPerawatan = Perawatan::with('barang.ruangan', 'ajuan')->get();
        return view('laporan.perawatan.app', compact('dataPerawatan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_perawatan' => 'required|date',
            'barang_id' => 'required|exists:barangs,id',
            'jenis_perawatan' => 'required|string',
            'biaya_perawatan' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:selesai,belum',
        ]);

        $perawatan = Perawatan::findOrFail($id);
        $perawatan->update($validated);

        return redirect()->back()->with('success', 'Data perawatan berhasil diperbarui.');
    }

    // public function updateKondisi(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'kondisi' => 'required|enum:baik,rusak,berat',
    //     ]);
    //     $perawatan = Perawatan::findOrFail($id);
    //     $barang = Barang::findOrFail(Perawatan::findOrFail($id)->barang_id);
    //     $barang->update($validated);

    //     return redirect()->back()->with('success', 'Kondisi perawatan berhasil diperbarui.');
    // }

    public function destroy($id)
    {
        $perawatan = Perawatan::findOrFail($id);
        $perawatan->delete();

        return redirect()->back()->with('success', 'Data perawatan berhasil dihapus.');
    }
}
