<?php

namespace App\Http\Controllers;

use App\Models\DataInventaris;
use App\Models\Ruangans;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;

class DataInventarisController extends Controller
{
    public function index()
    {
        $dataInventaris = DataInventaris::with('ruangan')->paginate(8);
        $ruangan = Ruangans::all();
        return view('inventaris.app', compact('dataInventaris', 'ruangan'));
    }

    public function show($id)
    {
        $details = DataInventaris::findOrFail($id);
        return view('inventaris.detail', compact('details'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string',
            'merk_barang' => 'required|string',
            'tahun_perolehan' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'sumber_dana' => 'required|in:bos,dak,hibah',
            'harga_perolehan' => 'nullable|numeric',
            'cv_pengadaan' => 'nullable|string',
            'jumlah_barang' => 'required|integer',
            'ruangan_id' => 'required|exists:ruangans,id',
            'kondisi' => 'nullable|string',
            'kepemilikan' => 'required|string',
            'penanggung_jawab' => 'nullable|string',
            'upload' => 'nullable|image|mimes:jpeg,png,jpg,svg+xml,webp,gif,heic|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('upload')) {
            // $path = $request->file('upload')->store('inventaris/gambar', 'public');
            // $validated['gambar_barang'] = $path;
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('uploads/inventaris');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $file->move($destinationPath, $filename);

                // Simpan path relatif dari public/
                $validated['gambar_barang'] = 'uploads/inventaris/' . $filename;
            }
        }

        // Generate kode_barang unik (opsional)
        $validated['kode_barang'] = 'BRG-' . strtoupper(Str::random(6));

        // Ubah kondisi dan kepemilikan agar sesuai dengan DB jika pakai enum
        $validated['kondisi_barang'] = $validated['kondisi'];
        $validated['kepemilikan_barang'] = $validated['kepemilikan'];

        unset($validated['kondisi'], $validated['kepemilikan']); // buang agar tidak duplikat kolom

        DataInventaris::create($validated);

        return redirect('/inventaris')->with('success', 'Data inventaris berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string|max:255',
            'merk_barang' => 'nullable|string|max:255',
            'tahun_perolehan' => 'required|numeric',
            'sumber_dana' => 'required|string',
            'harga_perolehan' => 'required|numeric',
            'cv_pengadaan' => 'nullable|string|max:255',
            'jumlah_barang' => 'required|numeric',
            'kondisi' => 'required|string|max:255',
            'kepemilikan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'upload' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $barang = DataInventaris::findOrFail($id);

        $barang->update($request->except('upload'));

        if ($request->hasFile('upload')) {
            $gambar = $request->file('upload')->store('uploads', 'public');
            $barang->gambar_barang = 'storage/' . $gambar;
            $barang->save();
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = DataInventaris::findOrFail($id);
        $barang->delete();
        return redirect('/inventaris')->with('success', 'Data inventaris berhasil dihapus.');
    }
}
