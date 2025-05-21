<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
