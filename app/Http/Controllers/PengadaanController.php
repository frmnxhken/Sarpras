<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengadaan;
use App\Models\Ruangans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->all();
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
