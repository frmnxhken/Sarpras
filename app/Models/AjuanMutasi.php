<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjuanMutasi extends Model
{
    protected $guarded = ['id'];
    protected $table = 'ajuan_mutasi';
    public function mutasi()
    {
        return $this->belongsTo(Mutasi::class, 'mutasi_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
