<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangans extends Model
{
    protected $guarded=['id'];
    public function dataBarang()
    {
        return $this->hasMany(Barang::class, 'ruangan_id'); // sesuaikan foreign key-nya
    }

}
