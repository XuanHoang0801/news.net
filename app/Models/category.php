<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    
    public function producer(){
        return $this->hasMany(producer::class,'id_category','id');
    }
    public function product(){
        
        return $this->hasManyThrough(product::class, producer::class, 'id_category', 'id_producer', 'id' );
    }
}
