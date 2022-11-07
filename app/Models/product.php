<?php

namespace App\Models;

use App\Models\category;
use App\Models\producer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    public function producer(){
        return $this->belongsTo(producer::class, 'id_producer', 'id');
    }
    // public function category(){
    //     return $this->belongsTo(category::class, 'id_category', 'id');
    // }
}
