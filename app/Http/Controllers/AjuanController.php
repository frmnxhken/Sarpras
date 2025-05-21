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
                'id' => $item->id,
                'model_type' => 'peminjaman',
                'created_at' => $item->created_at->format('d M Y'),
                'jenis' => 'Peminjaman',
                'pengaju' => $item->user->name ?? '-',
                'barang' => $item->peminjaman->barang->nama_barang ?? '-',
                'jumlah' => $item->peminjaman->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->peminjaman->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => '-',
            ]);
        }

        foreach ($pengadaan as $item) {
            $dataAjuan->push([
                'id' => $item->id,
                'model_type' => 'pengadaan',
                'created_at' => $item->created_at->format('d M Y'),
                'pengaju' => $item->user->name ?? '-',
                'jenis' => 'Pengadaan',
                'barang' => $item->barang->nama_barang ?? '-',
                'jumlah' => $item->barang->jumlah_barang ?? '-',
                'status' => $item->status,
                'ruangan' => $item->barang->ruangan->nama_ruangan ?? '-',
                'keterangan' => '-',
            ]);
        }
        $dataAjuan = $dataAjuan
            // ->where('status', 'pending')
            ->sortByDesc('created_at');

        return view('ajuan.app', compact('dataAjuan'));
    }

    public function UpdateStatus($type, $id, $status)
    {
        if ($type === 'peminjaman') {
            $ajuan = AjuanPeminjaman::find($id);
        } elseif ($type === 'pengadaan') {
            $ajuan = AjuanPengadaan::find($id);
        } else {
            return redirect()->back()->with('error', 'Jenis ajuan tidak valid.');
        }

        if (!$ajuan) {
            return redirect()->back()->with('error', 'Data ajuan tidak ditemukan.');
        }

        $ajuan->status = $status;
        $ajuan->save();

        return redirect()->back()->with('success', 'Status ajuan berhasil diperbarui.');
    }
}
