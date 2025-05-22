<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjuanPerawatan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'ajuan_perawatan';
    public function perawatan()
    {
        return $this->belongsTo(Perawatan::class, 'perawatan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
