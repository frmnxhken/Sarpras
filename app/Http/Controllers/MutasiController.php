<?php

namespace App\Http\Controllers;

use App\Models\AjuanMutasi;
use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\Ruangans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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
        try {
            $validated = $request->validate([
                'tanggal_mutasi'  => 'required|date',
                'nama_mutasi'     => 'required|string|max:255',
                'barang_id'       => 'required|exists:barangs,id',
                'jumlah_barang'   => 'required|integer|min:1',
                'tujuan'          => 'required|integer|exists:ruangans,id',
                'keterangan'      => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal_error', 'modalMutasiBarang');
        }

        $barangAsal = Barang::findOrFail($validated['barang_id']);

        // Cek jika ruangan tujuan sama dengan asal
        if ($validated['tujuan'] == $barangAsal->ruangan_id) {
            return redirect()->back()
                ->withErrors(['tujuan' => 'Ruangan tujuan tidak boleh sama dengan ruangan asal.'])
                ->withInput()
                ->with('modal_error', 'modalMutasiBarang');
        }

        // Validasi stok
        if ($validated['jumlah_barang'] > $barangAsal->jumlah_barang) {
            return redirect()->back()
                ->withErrors(['jumlah_barang' => 'Jumlah melebihi stok yang tersedia.'])
                ->withInput()
                ->with('modal_error', 'modalMutasiBarang');
        }

        $mutasi = Mutasi::create($validated);

        AjuanMutasi::create([
            'user_id' => Auth::id(),
            'mutasi_id' => $mutasi->id,
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
        try {
            $validated = $request->validate([
                'tanggal_mutasi'  => 'required|date',
                'nama_mutasi'     => 'required|string|max:255',
                'barang_id'       => 'required|exists:barangs,id',
                'jumlah_barang'   => 'required|integer|min:1',
                'tujuan'          => 'required|integer',
                'keterangan'      => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            // Kirim modal id yang error ke session agar modal tersebut dibuka
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal_error', 'editMutasi' . $id);
        }

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
