<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjuanPeminjaman extends Model
{
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
