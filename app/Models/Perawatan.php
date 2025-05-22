<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    protected $guarded = ['id'];
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

        public function ajuan()
    {
        return $this->hasMany(AjuanPerawatan::class, 'perawatan_id');
    }
}
