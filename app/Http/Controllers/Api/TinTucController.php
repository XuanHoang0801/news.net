<?php

namespace App\Http\Controllers\Api;

use App\Models\TinTuc;
// use App\Models\Loaitin;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TinTucRequest;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tintuc = TinTuc::with(['loaitin', 'users'])->get();
        return $tintuc;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinTucRequest $request)
    {
        $tintuc = new TinTuc();
        $tintuc->title=$request->title;
        $tintuc->nd_tt=$request->noidung;
        $tintuc->id_tl=$request->theloai;
        $tintuc->id_lt=$request->loaitin;
        $tintuc->id_user = $request->user()->id;

        //kiểm tra xem ngườu dùng có upload file
        if(!$request ->hasFile('img')){
            //Nếu ko chọn thì 
            $tintuc->img = 'img.png';
        }
        else{
            //Nếu chọn thì
            $img = $request->file('img'); //lấy thông tin file
            $name = $img->getClientOriginalName(); //Lấy tên file
            $tintuc->img = $name;
            $upload = $img->move('assets/img', $img->getClientOriginalName()); //upload file vào thư mục
        }
        $tintuc->save();
        return $tintuc;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tintuc = TinTuc::with(['theloai', 'loaitin','users'])->where('id', $id)->get();
        if($tintuc->isEmpty()){
            return response()->json(['message', 'Bài viết không tồn tại!'],422);
        }
        else{
            return $tintuc;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TinTucRequest $request, $id)
    {
        // dd($request->all());
        $tintuc = TinTuc::find($id);
        $tintuc->title=$request->title;
        $tintuc->nd_tt=$request->noidung;
        $tintuc->id_tl=$request->theloai;
        $tintuc->id_lt=$request->loaitin;
        $tintuc->id_user = $request->user()->id;

        //kiểm tra xem ngườu dùng có upload file
        if(!$request->hasFile('img')){
            //Nếu ko chọn thì 
            null;
        }
        else{
            //Nếu chọn thì
            $img = $request->file('img'); //lấy thông tin file
            $name = $img->getClientOriginalName(); //Lấy tên file
            $tintuc->img = $name;
            $upload = $img->move('assets/img', $img->getClientOriginalName()); // upload file vào thư mục
        }
        $tintuc->save();
        $tintuc = TinTuc::with(['theloai', 'loaitin', 'users'])->where('id',$id)->get();
        
     return $tintuc;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc=TinTuc::find($id);
        $tintuc->delete();
        $comment = Comments::where('id_tintuc',$id);
        $comment->delete();
        return response()->json(['message', 'Đã xóa bài viết thành công!'],200);
    }

    public function search($title){
        $tintuc = TinTuc::with(['theloai','loaitin','users'])->where('title','like','%'.$title.'%')->get();
        if($tintuc->isEmpty()){
            return response()->json(['Thông báo', 'Không tìm thấy kết quả!'],422);  
        }
        return $tintuc;
    }

    public function theloai($id){
        $theloai = TheLoai::with(['tintuc'])->find($id);
        return $theloai;
    }

    public function loaitin($id){
        $loaitin = LoaiTin::with(['theloai','tintuc'])->find($id);
        
        return $loaitin;
    }
}
