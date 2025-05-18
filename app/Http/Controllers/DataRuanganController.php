<?php

namespace App\Http\Controllers;

use App\Models\Ruangans;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataRuanganController extends Controller
{
    public function index()
    {
        $dataRuang = Ruangans::withCount('dataInventaris')->get();
        return view('ruang.data-ruang', compact('dataRuang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan' => 'required|string',
        ]);
        $validated['kode_ruangan'] = 'R-' . strtoupper(Str::random(6));
        Ruangans::create($validated);
        return redirect('/ruang');
    }

    public function edit(Request $request,$id){
        $validated = $request->validate([
            'nama_ruangan' => 'required|string',
        ]);
        // Update data
        $ruangan = Ruangans::findOrFail($id);
        $ruangan->update($validated);
        return redirect('/ruang');
    }

    public function destroy($id)
    {
        $dataRuang = Ruangans::findOrFail($id);
        $dataRuang->delete();
        return redirect('/ruang');
    }
}
