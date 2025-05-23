<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $barangRusak = Barang::where('kondisi_barang', 'rusak')->count();
        // $barangBaru2025 = Barang::where('tahun_perolehan',now()->year())->count();
        $tahunSekarang = date('Y');
        $barangBaru2025 = Barang::where('tahun_perolehan', $tahunSekarang)->count();
        $tahunSekarang = now()->year();

        // Ambil jumlah barang baru per tahun
        $barangBaruPerTahun = DB::table('barangs')
            ->select('tahun_perolehan', DB::raw('count(*) as total'))
            ->groupBy('tahun_perolehan')
            ->pluck('total', 'tahun_perolehan');

        // Ambil jumlah barang rusak per tahun
        $barangRusakPerTahun = DB::table('barangs')
            ->select('tahun_perolehan', DB::raw('count(*) as total'))
            ->where('kondisi_barang', 'rusak')
            ->groupBy('tahun_perolehan')
            ->pluck('total', 'tahun_perolehan');

        // Gabungkan semua tahun sebagai x-axis
        $tahunLabels = $barangBaruPerTahun->keys()
            ->merge($barangRusakPerTahun->keys())
            ->unique()
            ->sort()
            ->values();

        $dataBarangBaru = [];
        $dataBarangRusak = [];

        foreach ($tahunLabels as $tahun) {
            $dataBarangBaru[] = $barangBaruPerTahun[$tahun] ?? 0;
            $dataBarangRusak[] = $barangRusakPerTahun[$tahun] ?? 0;
        }

        return view('dashboard.app', compact(
            'totalBarang',
            'barangRusak',
            'barangBaru2025',
            'tahunSekarang',
            'tahunLabels',
            'dataBarangBaru',
            'dataBarangRusak'
        ));

        // return view('dashboard.app', compact('totalBarang', 'barangRusak', 'barangBaru2025', 'tahunSekarang'));

        // return view('dashboard.app', compact('totalBarang', 'barangRusak', 'barangBaru2025'));
    }
}
