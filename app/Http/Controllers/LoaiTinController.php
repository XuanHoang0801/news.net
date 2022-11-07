<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
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
        return view('admin.pages.loaitin.list', ['loaitin' => $loaitin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $theloai = TheLoai::all();
        return view('admin.pages.loaitin.add', ['theloai' => $theloai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $loaitin =  new LoaiTin;
        $loaitin->ten_lt = $request->name;
        $loaitin->id_tl = $request->theloai;
        $loaitin->save();
        return redirect('dashboard/loai-tin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.pages.loaitin.update', ['loaitin' => $loaitin, 'theloai'=>$theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $loaitin =  LoaiTin::find($id);
        $loaitin->ten_lt = $request->name;
        $loaitin->id_tl = $request->theloai;
        $loaitin->save();
        return redirect('dashboard/loai-tin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('dashboard/loai-tin');
    }
}
