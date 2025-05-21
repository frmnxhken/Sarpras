<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $guarded = ['id'];
    protected $table = 'peminjaman';
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function ajuan()
    {
        return $this->hasMany(AjuanPeminjaman::class, 'peminjaman_id');
    }
}
