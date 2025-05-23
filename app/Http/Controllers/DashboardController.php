<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $barangRusak = Barang::where('kondisi_barang', 'rusak')->count();
        $barangBaru2025 = Barang::whereYear('created_at', 2025)->count();

        return view('dashboard.app', compact('totalBarang', 'barangRusak', 'barangBaru2025'));
    }
}
