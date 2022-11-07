<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class producer extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(category::class, 'id_category', 'id');
    }
}
