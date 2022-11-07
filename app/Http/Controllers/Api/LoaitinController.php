<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoaiTinRequest;
use App\Models\Loaitin;
use Illuminate\Http\Request;

class LoaitinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loaitin = LoaiTin::with('theloai')->get();
        return $loaitin;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiTinRequest $request)
    {
        //
        $loaitin = new Loaitin();
        $loaitin->ten_lt = $request->name;
        $loaitin->id_tl  = $request->theloai;
        $loaitin->save();
        $loaitin = Loaitin::with('theloai')->get();
        return $loaitin;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loaitin = Loaitin::with('theloai')->where('id',$id)->get();
        
        if($loaitin->isEmpty()){
            return response()->json(['message', 'Loại tin không tồn tại'], 422);
        }
        return $loaitin;
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
    public function update(LoaiTinRequest $request, $id)
    {
        $loaitin = Loaitin::find($id);
        $loaitin->ten_lt = $request->name;
        $loaitin->id_tl = $request->theloai;
        $loaitin->save();
        $loaitin = Loaitin::with('theloai')->get();
        return $loaitin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return response()->json(['message', 'Đã xóa loại tin thành công!']);
    }

    public function search($name){
        $loaitin = Loaitin::where('ten_lt', 'like','%'.$name.'%')->get();
        if($loaitin->isEmpty()){
            return response()->json(['Thông báo', 'Không tìm thấy kết quả!'],422);
        }
        return $loaitin;
    }
}
