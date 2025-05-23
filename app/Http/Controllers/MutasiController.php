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
        $mutasi = Mutasi::with(['barang.ruangan', 'ajuan'])->whereHas('ajuan', function ($query) {
            $query->where('status', 'pending');
        })->get();
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
        // Simpan data mutasi
        $mutasi2 = Mutasi::create($validated);
        AjuanMutasi::create([
            // 'user_id' => auth()->user()->id,
            'user_id' => 1,
            'mutasi_id' => $mutasi2->id,
        ]);

        return redirect()->back()->with('success', 'Data mutasi berhasil disimpan.');
    }

    public function laporan()
    {
        $mutasi = Mutasi::with(['barang.ruangan', 'ajuan'])->get();
        $ruangans = Ruangans::pluck('nama_ruangan', 'id')->toArray();
        return view('laporan.mutasi.app', compact('mutasi', 'ruangans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_mutasi' => 'required|date',
            'nama_mutasi' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_barang' => 'required|integer|min:1',
            'tujuan' => 'required|integer',
            'keterangan' => 'nullable|string',
            'status_mutasi' => 'required|in:Batal,pending,Dikirim',
        ]);

        $mutasi = Mutasi::findOrFail($id);
        $mutasi->update($validated);

        return redirect()->back()->with('success', 'Data mutasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();

        return redirect()->back()->with('success', 'Data mutasi berhasil dihapus.');
    }
}
