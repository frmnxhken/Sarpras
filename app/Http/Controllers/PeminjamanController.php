<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExportFiltered;
use App\Models\AjuanPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('ruangan')->get();
        $items = Peminjaman::with(['barang.ruangan', 'ajuan'])->where('status_peminjaman', 'Dipinjam')->get();
        return view('peminjaman.app', compact('items', 'barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'nama_peminjam' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_barang' => 'required|integer|min:1',
            'status_peminjaman' => 'nullable|in:Dipinjam,Dikembalikan,Diperpanjang,Hilang',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        // Cek stok barang
        if ($validated['jumlah_barang'] > $barang->jumlah_barang) {
            return back()->withErrors(['jumlah_barang' => 'Jumlah barang yang diminta melebihi stok tersedia.'])->withInput();
        }

        // Simpan peminjaman
        $peminjaman = Peminjaman::create($validated);

        // Kurangi stok barang
        $barang->jumlah_barang -= $validated['jumlah_barang'];
        $barang->save();

        AjuanPeminjaman::create([
            // 'user_id' => auth()->user()->id,
            'user_id' => 1,
            'peminjaman_id' => $peminjaman->id,
        ]);
        return redirect('/peminjaman');
    }

    public function updateStatus(
        $id,
        $status,
        $jumlah_barang,
        $barang_id
    ) {
        $peminjaman = Peminjaman::findOrFail($id);

        // Validasi status yang diperbolehkan
        $allowedStatus = ['Dikembalikan', 'Hilang'];
        if (!in_array($status, $allowedStatus)) {
            return back()->with('error', 'Status tidak valid.');
        }

        $peminjaman->status_peminjaman = $status;
        $peminjaman->tanggal_pengembalian = now(); // update tanggal pengembalian
        $peminjaman->save();

        $barang = Barang::findOrFail($barang_id);
        if ($status == 'Dikembalikan') {
            $barang->jumlah_barang += $jumlah_barang;
        }
        $barang->save();

        return back()->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    public function laporan()
    {
        $items = Peminjaman::with(['barang.ruangan', 'ajuan'])->get();
        return view('laporan.peminjaman.app', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_peminjamanEdit' => 'required|date',
            'tanggal_pengembalianEdit' => 'required|date|after_or_equal:tanggal_peminjamanEdit',
            'nama_peminjamEdit' => 'required|string|max:255',
            'barang_idEdit' => 'required|exists:barangs,id',
            'jumlah_barangEdit' => 'required|integer|min:1',
            'status_peminjamanEdit' => 'required|in:Dipinjam,Dikembalikan,Diperpanjang,Hilang',
            'keteranganEdit' => 'nullable|string|max:255',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());
        return redirect()->back()->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus.');
    }

    // public function cetakPDF()
    // {
    //     $items = Peminjaman::with(['barang.ruangan'])
    //         ->whereNull('laporan')
    //         ->get();

    //     $pdf = Pdf::loadView('laporan.peminjaman.pdf', compact('items'));
    //     return $pdf->stream('laporan_peminjaman.pdf');
    // }

    public function cetakPDF(Request $request)
    {
        $periode = $request->input('periode', 1); // default 1 bulan
        $startDate = Carbon::now()->subMonths($periode);

        $items = Peminjaman::with(['barang.ruangan'])
            ->whereNull('laporan')
            ->where('tanggal_pinjam', '>=', $startDate)
            ->get();

        $pdf = Pdf::loadView('laporan.peminjaman.pdf', compact('items', 'periode'));
        return $pdf->stream('laporan_peminjaman.pdf');
    }


    // public function exportExcel()
    // {
    //     return Excel::download(new PeminjamanExportFiltered, 'laporan_peminjaman.xlsx');
    // }

    public function exportExcel(Request $request)
    {
        $periode = $request->input('periode', 1); // default 1 bulan
        return Excel::download(new PeminjamanExportFiltered($periode), 'laporan_peminjaman.xlsx');
    }
}
