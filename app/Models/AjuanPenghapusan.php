<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjuanPenghapusan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'ajuan_penghapusan';
    public function penghapusan()
    {
        return $this->belongsTo(Penghapusan::class, 'penghapusan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
