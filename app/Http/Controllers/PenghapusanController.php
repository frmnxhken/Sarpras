<?php

namespace App\Http\Controllers;

use App\Models\Penghapusan;
use Illuminate\Http\Request;

class PenghapusanController extends Controller
{
    public function index(){
        $data = Penghapusan::with(['barang.ruangan', 'ajuan'])->whereHas('ajuan', function ($query) { $query->where('status', 'pending');})->get();
        return view('penghapusan.app', compact('data'));
    }
    public function laporan(){
        $data = Penghapusan::with(['barang.ruangan', 'ajuan'])->get();
        return view('laporan.penghapusan.app', compact('data'));
    }
}
