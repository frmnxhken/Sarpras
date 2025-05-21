<?php

namespace App\Exports;


use App\Models\Peminjaman;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExportFiltered implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peminjaman::with('barang.ruangan')
            ->whereNull('laporan')
            ->get()
            ->map(function ($item) {
                return [
                    'Tanggal Pinjam' => $item->tanggal_peminjaman,
                    'Tanggal Kembali' => $item->tanggal_pengembalian,
                    'Peminjam' => $item->nama_peminjam,
                    'Ruangan' => $item->barang->ruangan->nama_ruangan ?? '-',
                    'Barang' => $item->barang->nama_barang ?? '-',
                    'Jumlah' => $item->jumlah_barang,
                    'Status' => $item->status_peminjaman,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Peminjam',
            'Ruangan',
            'Barang',
            'Jumlah',
            'Status',
        ];
    }
}
