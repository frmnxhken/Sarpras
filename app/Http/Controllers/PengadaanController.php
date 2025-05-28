<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengadaan;
use App\Models\Ruangans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengadaanController extends Controller
{
    public function index(){
        return view('pengadaan.app');
    }
    public function createTambahJumlah()
    {
        $barangs = Barang::all();
        return view('barang_requests.tambah_jumlah', compact('barangs'));
    }

    public function createTambahBaru()
    {
        $ruangans = Ruangans::all();
        return view('barang_requests.tambah_baru', compact('ruangans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe_pengajuan' => 'required|in:baru,tambah',
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string|max:255',
            'merk_barang' => 'required|string|max:255',
            'tahun_perolehan' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'sumber_dana' => 'required|in:BOS,DAK,Hibah',
            'harga_perolehan' => 'nullable|numeric|min:0',
            'cv_pengadaan' => 'nullable|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'ruangan_id' => 'required|exists:ruangans,id',
            'kondisi_barang' => 'nullable|in:baik,rusak,berat',
            'kepemilikan_barang' => 'required|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'barang_id' => 'required_if:tipe_pengajuan,tambah|exists:barangs,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        if ($request->hasFile('gambar_barang')) {
            $file = $request->file('gambar_barang');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/inventaris');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);
            $data['gambar_barang'] = 'uploads/inventaris/' . $filename;
        }

        Pengadaan::create($data);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim dan menunggu persetujuan.');
    }

}
