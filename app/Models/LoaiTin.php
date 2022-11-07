<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected $table = 'loaitin';
    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai', 'id_tl','id');
    }

    public function tintuc()
    {
        return $this->hasMany('App\Models\TinTuc', 'id_lt','id');
    }


}
