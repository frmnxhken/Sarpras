<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    public function index()
    {
        $dataPerawatan = Perawatan::with('barang.ruangan')->get();
        return view('perawatan.app', compact('dataPerawatan'));
    }
}
