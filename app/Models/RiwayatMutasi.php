<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMutasi extends Model
{
    protected $guarded=['id'];
    public function dataInventaris()
    {
        return $this->belongsTo(DataInventaris::class);
    }
}
