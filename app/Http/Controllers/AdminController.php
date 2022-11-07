<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkuser');
    }

    public function getHome(){
        
        if (Auth::check())
        {
            return view('admin.home');
        }
        else
        {
            return redirect('dashboard/login');
        }
    }
    
    
    
}
