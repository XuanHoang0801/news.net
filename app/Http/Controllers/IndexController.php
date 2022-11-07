<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\like;

class IndexController extends Controller
{
    public function getDanhSach(){
        $tintuc = TinTuc::all();
        $main = TinTuc::first();
        $theloai = TheLoai::all();
        $xahoi = TinTuc::where("id_tl",2)->get();

        return view('index', ['tintuc' => $tintuc,'main' => $main, 'theloai' => $theloai, 'xahoi' => $xahoi]);
    }

    public function getBaiViet($id){
        $detail = TinTuc::find($id); 
        if(empty($detail)){
            return redirect('404');
        }
        $tintuc = TinTuc::all();
        $main = TinTuc::first();
        $theloai = TheLoai::all();
        $xahoi = TinTuc::where("id_tl",2)->get();
        $comment = Comments::where('id_tintuc', $id)->get();
        $like = like::where('id_tt',$id)->get();


        return view('detail', ['detail'=> $detail, 'tintuc' => $tintuc,'main' => $main, 'theloai' => $theloai, 'xahoi' => $xahoi, 'comment' =>$comment, 'like'=>$like]);
    }

    public function comment(CommentRequest $request,$id){
        $comment = new Comments();
        $user = Auth::user();
        if(isset($user)){
            $comment->id_user = Auth::user()->id;
            $comment->id_tintuc = $id;
            $comment->noidung = $request->comment;
            $comment->save();
        }
        else{
            $comment->id_user = 30;
            $comment->id_tintuc = $id;
            $comment->noidung = $request->comment;
            $comment->save();
        }
        return redirect('tin-tuc/'.$id);
    }

    public function like(Request $request,$id){
        $like = new like();
        $like->id_tt=$id;
        $like->id_user = $request->user()->id;
        $like->save();
        return redirect('tin-tuc/'.$id);
    }
    public function unlike(Request $request,$id){
        $id_user = Auth::user()->id;
        $unlike=like::where('id_user',$id_user)->where('id_tt',$id)->delete(); ;
        
        return redirect('tin-tuc/'.$id);

    }

    public function theloai($id){
        $theloai = TheLoai::all();
        $tt=TheLoai::with('tintuc')->find($id);
        $tintuc = $tt->tintuc;
        return view('category', ['tintuc'=>$tintuc,'theloai'=>$theloai]);
    }


}
