<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    
    protected $guarded = ['id'];
    protected $table = 'penghapusan';
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function ajuan()
    {
        return $this->hasMany(AjuanPenghapusan::class, 'penghapusan_id');
    }
}
