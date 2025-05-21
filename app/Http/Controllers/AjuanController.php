<?php

namespace App\Http\Controllers;

use App\Models\AjuanPeminjaman;
use App\Models\AjuanPengadaan;
use Illuminate\Http\Request;

class AjuanController extends Controller
{
    public function index()
    {
        $peminjaman = AjuanPeminjaman::with(['user', 'peminjaman.barang.ruangan'])->get();
        $pengadaan = AjuanPengadaan::with((['user', 'barang.ruangan']))->get();

        $dataAjuan = collect();

        foreach ($peminjaman as $item) {
            $dataAjuan->push([
                'created_at' => $item->created_at->format('d M Y'),
                'jenis' => 'Peminjaman',
                'pengaju' => $item->user->name ?? '-',
                'barang' => $item->peminjaman->barang->nama_barang ?? '-',
                'jumlah' => $item->peminjaman->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->peminjaman->barang->ruangan->nama_ruangan ?? '-',
            ]);
        }

        foreach ($pengadaan as $item) {
            $dataAjuan->push([
                'created_at' => $item->created_at->format('d M Y'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Pengadaan',
                'barang' => $item->barang->nama_barang ?? '-',
                'jumlah' => $item->barang->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->barang->ruangan->nama_ruangan ?? '-',
            ]);
        }
        $dataAjuan = $dataAjuan->sortByDesc('created_at');

        return view('ajuan.app', compact('dataAjuan'));
    }
}
