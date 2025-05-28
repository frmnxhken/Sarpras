<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangans::class);
    }
}
