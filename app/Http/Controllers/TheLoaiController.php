<?php

namespace App\Http\Controllers;

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
        $theloai = TheLoai::all();
        return view('admin.pages.theloai.list', ['theloai' => $theloai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.theloai.add');
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
        $this-> validate($request, [
            'name' => 'required|unique:theloai,name|min:3', 
        ], [
            'name.required'=> 'Bạn chưa nhập thể loại!',
            'name.unique' => 'Thể loại đã tồn tại!',
            'name.min'=> 'Vui lòng nhập thể loại từ 3 ký tự trở lên'
        ]) ;

        $theloai =  new TheLoai;
        $theloai->name = $request->name;
        $theloai->save();

        return redirect('dashboard/the-loai');
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
        return view('admin.pages.theloai.update', ['theloai' => $theloai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $theloai = TheLoai::find($id);
        return view('admin.pages.theloai.update', ['theloai' => $theloai]);
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
        $this-> validate($request, [
            'name' => 'required|min:3', 
        ], [
            'name.required'=> 'Bạn chưa nhập thể loại!',
            'name.min'=> 'Vui lòng nhập thể loại từ 3 ký tự trở lên!'

        ]) ;

        $theloai =  TheLoai::find($id);
        $theloai->name = $request->name;
        $theloai->save();

        return redirect('dashboard/the-loai');
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
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('dashboard/the-loai');
    }

    public function search($search){
        $theloai = TheLoai::where('name', 'like', '%'.$search.'%')->get();
        return $theloai;
    }
}
