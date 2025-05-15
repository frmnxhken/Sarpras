<?php

namespace App\Http\Controllers;

use App\Models\DataInventaris;
use Illuminate\Http\Request;

class DataInventarisController extends Controller
{
    public function index()
    {   
        $dataInventaris = DataInventaris::all();
        return view('inventaris.app',compact('dataInventaris'));
    }

    public function show($id)
    {
        $details = DataInventaris::findOrFail($id);
        return view('inventaris.detail', compact('details'));
    }
    public function create()
    {
        return view('data-inventaris.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('data-inventaris.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
