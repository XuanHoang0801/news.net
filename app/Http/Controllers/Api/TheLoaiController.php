<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TheLoaiRequest;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $theloai = TheLoai::all();
        return $theloai;
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
    public function store(TheLoaiRequest $request)
    {
        $theloai = new TheLoai();
        $theloai->name = $request->name;
        $theloai->save();
        return $theloai;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theloai = TheLoai::find($id);
        return $theloai;
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
    public function update(TheLoaiRequest $request, $id)
    {
        $theloai= TheLoai::find($id);
        $theloai->name=$request->name;
        $theloai->save();
        return $theloai;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return response()->json(['message', 'Đã xóa thể loại thành công!']);
    }

    public function search($search){
        $theloai = TheLoai::where('name', 'like', '%'.$search.'%')->get();
        if($theloai->isEmpty()){
            return response()->json(['Thông báo', 'Không tìm thấy kết quả!'],422);
        }
        return $theloai;
    }
}
