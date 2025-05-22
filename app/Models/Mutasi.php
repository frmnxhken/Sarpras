<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function ajuan()
    {
        return $this->hasMany(AjuanMutasi::class, 'mutasi_id');
    }

}
