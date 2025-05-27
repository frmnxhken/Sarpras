<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penghapusan;
use Illuminate\Http\Request;

class PenghapusanController extends Controller
{
    // public function index()
    // {
    //     $barangs = Barang::with('ruangan')->get();
    //     $data = Penghapusan::with(['barang.ruangan', 'ajuan'])->whereHas('ajuan', function ($query) {
    //         $query->where('status', 'pending');
    //     })->get();
    //     return view('penghapusan.app', compact('data', 'barangs'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $barangs = Barang::with('ruangan')->get();
        $query = Penghapusan::with(['barang.ruangan', 'ajuan'])->whereHas('ajuan', function ($q) {
            $q->where('status', 'pending');
        });

        // Filter berdasarkan pencarian barang
        if ($search) {
            $query->whereHas('barang', function ($q) use ($search) {
                $q->where('nama_barang', 'like', '%' . $search . '%');
            });
        }

        $data = $query->get();

        return view('penghapusan.app', compact('data', 'barangs'));
    }

    public function laporan(Request $request)
    {
        $search = $request->input('search');
        $query = Penghapusan::with(['barang.ruangan', 'ajuan'])->whereHas('ajuan', function ($q) {
            $q->where('status', 'pending');
        });

        // Filter berdasarkan pencarian barang
        if ($search) {
            $query->whereHas('barang', function ($q) use ($search) {
                $q->where('nama_barang', 'like', '%' . $search . '%');
            });
        }

        $data = $query->get();
        // $data = Penghapusan::with(['barang.ruangan', 'ajuan'])->get();
        return view('laporan.penghapusan.app', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $penghapusan = Penghapusan::findOrFail($id);
        $penghapusan->barang_id = $request->barang_id;
        $penghapusan->jumlah = $request->jumlah;
        $penghapusan->keterangan = $request->keterangan;
        $penghapusan->save();

        // return response()->json(['message' => 'Data penghapusan berhasil diupdate', 'data' => $penghapusan]);
        return redirect()->back()->with('success', 'Berhasil diupdate.');
    }

    // Method untuk menghapus data penghapusan
    public function destroy($id)
    {
        $penghapusan = Penghapusan::findOrFail($id);
        $penghapusan->delete();

        return redirect()->back()->with('success', 'Penghapusan berhasil dibatalkan.');
    }
}
