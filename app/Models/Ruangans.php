<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangans extends Model
{
    protected $guarded=['id'];
    public function dataInventaris()
    {
        return $this->hasMany(DataInventaris::class, 'ruangan_id');
    }
}
