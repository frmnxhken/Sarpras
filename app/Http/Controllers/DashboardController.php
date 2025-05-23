<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return view('dashboard.app', compact('totalBarang', 'barangRusak', 'barangBaru2025', 'tahunSekarang'));

        // return view('dashboard.app', compact('totalBarang', 'barangRusak', 'barangBaru2025'));
    }
}
