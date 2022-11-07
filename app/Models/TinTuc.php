<?php

namespace App\Models;

use App\Models\like;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TinTuc extends Model
{
    use HasFactory,Likeable,SoftDeletes;
    protected $table = "Tintuc";
    
    public function loaitin()
    {
        return $this->belongsTo('App\Models\LoaiTin', 'id_lt', 'id');
    }
    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai','id_tl', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comments', 'id_tintuc', 'id');
    }

    public function like(){
        return $this->hasMany([like::class, 'id_tt', 'id']);
    }



    
}
