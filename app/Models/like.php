<?php

namespace App\Models;

use App\Models\TinTuc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class like extends Model
{
    use HasFactory;
    public function tintuc(){
        return $this->belongsTo([TinTuc::class, 'id_tt','id']);
    }
}
