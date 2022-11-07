<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin ;
use App\Models\TheLoai;
use Illuminate\Http\Request;
class AjaxController extends Controller
{
   public function getLoaiTin($idTheLoai){
        $loaitin = LoaiTin::where('id_tl', $idTheLoai)->get();
        echo "<option selected>Hãy chọn loại tin...</option>";
        foreach($loaitin as $lt)
        {
            
            echo "<option value='".$lt->id."'>".$lt->ten_lt."</option>";
        }
   }
}
