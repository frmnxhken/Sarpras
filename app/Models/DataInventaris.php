<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataInventaris extends Model
{
    protected $guarded=['id'];
    public function ruangan()
    {
        return $this->belongsTo(Ruangans::class);
    }
}
