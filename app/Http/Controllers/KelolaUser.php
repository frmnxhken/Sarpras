<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KelolaUser extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pengaturan.kelola', compact('user'));
    }
}
