<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded=['id'];
    public function ruangan()
    {
        return $this->belongsTo(Ruangans::class, 'ruangan_id');
    }
    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'barang_id');
    }
    public function ajuan()
    {
        return $this->hasMany(AjuanPengadaan::class, 'barang_id');
    }

    public function perawatan()
    {
        return $this->hasMany(Perawatan::class, 'barang_id');
    }
}
