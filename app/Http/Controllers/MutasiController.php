<?php

namespace App\Http\Controllers;

use App\Models\AjuanMutasi;
use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\Ruangans;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MutasiController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['ruangan'])->where('jumlah_barang', '>', 0)->get();
        $mutasi = Mutasi::with(['barang.ruangan'])->get();
        $ruangan = Ruangans::all();
        $ruangans = Ruangans::pluck('nama_ruangan', 'id')->toArray();

        return view('mutasi.app', compact('mutasi', 'ruangans', 'ruangan', 'barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_mutasi' => 'required|date',
            'nama_mutasi' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_barang' => 'required|integer|min:1',
            'tujuan' => 'required|integer|exists:ruangans,id',
            'keterangan' => 'nullable|string',
        ]);

        // Ambil data barang asal
        $barangAsal = Barang::findOrFail($validated['barang_id']);

        if ($validated['tujuan'] == $barangAsal->ruangan_id) {
            return back()->withErrors(['tujuan' => 'Ruangan tujuan tidak boleh sama dengan ruangan asal.']);
        }

        // Validasi stok tersedia
        if ($validated['jumlah_barang'] > $barangAsal->jumlah_barang) {
            return back()->withErrors(['jumlah_barang' => 'Jumlah melebihi stok yang tersedia.'])->withInput();
        }

        // Kurangi stok barang asal
        $barangAsal->jumlah_barang -= $validated['jumlah_barang'];
        $barangAsal->save();

        // Cek apakah barang dengan nama dan ruangan tujuan sudah ada
        $barangTujuan = Barang::where('nama_barang', $barangAsal->nama_barang)
            ->where('ruangan_id', $validated['tujuan'])
            ->where('merk_barang', $barangAsal->merk_barang)
            ->where('kondisi_barang', $barangAsal->kondisi_barang)
            ->first();
        if ($barangTujuan) {
            $barangTujuan->jumlah_barang += $validated['jumlah_barang'];
            $barangTujuan->save();
        } else {
            // Jika tidak ada, buat data baru di ruangan tujuan
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
                'jumlah_barang' => $validated['jumlah_barang'],
                'ruangan_id' => $validated['tujuan'],
                'kondisi_barang' => $barangAsal->kondisi_barang,
                'kepemilikan_barang' => $barangAsal->kepemilikan_barang,
                'penanggung_jawab' => $barangAsal->penanggung_jawab,
                'gambar_barang' => $barangAsal->gambar_barang,
            ]);
        }

        // Simpan data mutasi
        $mutasi2 = Mutasi::create($validated);

        AjuanMutasi::create([
            // 'user_id' => auth()->user()->id,
            'user_id' => 1,
            'mutasi_id' => $mutasi2->id,
        ]);

        return redirect()->back()->with('success', 'Data mutasi berhasil disimpan.');
    }
}
