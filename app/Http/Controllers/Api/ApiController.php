<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ApiController extends Controller
{
    public function getDanhSach(){
        $table = TinTuc::all();
        return $table;
    }
}
