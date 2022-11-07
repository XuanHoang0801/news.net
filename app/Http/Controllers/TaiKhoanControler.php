<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiKhoanControler extends Controller
{
    public function getDanhSach(){
        $user = User::all();
        return view('admin.pages.taikhoan.list', ['user'=>$user]);
    }

    public function getProfile()
    {
        $user = Auth::user()->id;
        $profile  = User::find($user);

        return view('admin.pages.taikhoan.profile', ['profile' => $profile]);
    }

    public function getXoa($id){
        $user = User::find ($id);
        $user->delete();
        return redirect('dashboard');
    }
}
