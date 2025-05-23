<?php

namespace App\Http\Controllers;

use App\Models\Penghapusan;
use Illuminate\Http\Request;

class PenghapusanController extends Controller
{
    public function index(){
        $data = Penghapusan::all();
        return view('penghapusan.app', compact('data'));
    }
}
