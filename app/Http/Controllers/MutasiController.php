<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasi = Mutasi::with(['barang'])->get();
        return view('mutasi.app', compact('mutasi'));
    }
}
