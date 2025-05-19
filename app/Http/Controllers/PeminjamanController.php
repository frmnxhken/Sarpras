<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $items=Peminjaman::with(['barang.ruangan'])->get();        
        return view('laporan.peminjaman.app',compact('items'));
    }

    public function store(Request $request)
    {
        // Logic to store peminjaman data
        // ...
        return redirect('/peminjaman');
    }

    public function show($id)
    {
        // Logic to show peminjaman details
        // ...
    }

    public function update(Request $request, $id)
    {
        // Logic to update peminjaman data
        // ...
    }

    public function destroy($id)
    {
        // Logic to delete peminjaman data
        // ...
    }
}
