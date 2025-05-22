<?php

namespace App\Http\Controllers;

use App\Models\AjuanPerawatan;
use App\Models\Barang;
use App\Models\Perawatan;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $dataPerawatan = Perawatan::with('barang.ruangan')->get();
        return view('perawatan.app', compact('dataPerawatan', 'barang'));
    }
    public function UpdateStatus($id, $status)
    {
        $perawatan = Perawatan::find($id);
        if ($perawatan) {
            $perawatan->status = $status;
            $perawatan->save();
            // return response()->json(['success' => true]);
            return redirect()->back();
        }
        // return response()->json(['success' => false]);
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
            // 'user_id' => auth()->user()->id,
            'user_id' => 1,
            'perawatan_id' => $perawatan->id,
        ]);

        return redirect()->back()->with('success', 'Data perawatan berhasil disimpan.');
    }
}
