<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjuanPengadaan extends Model
{  
    protected $guarded = ['id'];
    protected $table = 'ajuan_pengadaan';
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
