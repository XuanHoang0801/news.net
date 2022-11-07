<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\Loaitin;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tintuc = TinTuc::with('theloai','loaitin')->paginate(5);

        return view('admin.pages.tintuc.list',['tintuc'=>$tintuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        $loaitin = Loaitin::all();
        return view('admin.pages.tintuc.add', ['theloai' => $theloai, 'loaitin' => $loaitin]);
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
            'name' => 'required|unique:TinTuc,title|min:3',
            'noidung'=>'required',
            
        ], [
            'name.required'=> 'Bạn chưa nhập tiêu đề bài viết!',
            'name.min' => 'Độ dài tiêu đề không hợp lệ!',
            'name.unique' => 'Tiêu đề bài viết đã tồn tại!',
            'noidung.required'=> 'Bạn chưa nhập nội dung bài viết!',
            
        ]) ;
        
        $tintuc = new TinTuc();
        $tintuc->title = $request->name;
        $tintuc->nd_tt  =$request->noidung;
        $tintuc->id_tl = $request->theloai;
        $tintuc->id_lt = $request->loaitin;
        $tintuc->id_user = Auth::user()->id;

        //upload file
        if($request->hasFile('file'))
        {
            $file  = $request->file('file');
            $name= $file->getClientOriginalName();
            
            while(file_exists("assets/img/".$name))
            {
                $name;
            }
            $file->move("assets/img/", $name);
            $tintuc->img= $name;
           
        }
        else{
            $tintuc->img = 'img.png';
        }
        $tintuc-> save();
        return redirect('dashboard/tin-tuc');
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
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = Loaitin::all();
        return view('admin.pages.tintuc.update', ['tintuc' => $tintuc, 'theloai' =>$theloai, 'loaitin' =>$loaitin]);
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
        $this-> validate($request, [
            'title' => 'required|min:3',
            'noidung'=>'required',
            
        ], [
            'title.required'=> 'Bạn chưa nhập tiêu đề bài viết!',
            'title.min' => 'Độ dài tiêu đề không hợp lệ!',
            
            'noidung.required'=> 'Bạn chưa nhập nội dung bài viết!',
            
        ]) ;
        $tintuc = TinTuc::find($id);

        $tintuc->title = $request->title;
        $tintuc->nd_tt  =$request->noidung;
        $tintuc->id_tl = $request->theloai;
        $tintuc->id_lt = $request->loaitin;
        $tintuc->id_user = Auth::user()->id;

        if($request->hasFile('file'))
        {
            $file  = $request->file('file');
            $name= $file->getClientOriginalName();
            
            while(file_exists("assets/img/".md5($name)))
            {
                $name;
            }
            $file->move("assets/img/", md5($name));
            $tintuc->img= md5($name);
            
        }
        else{
            null;
        }
        $tintuc-> save();
        return redirect('dashboard/tin-tuc');
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
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('dashboard/tin-tuc');
    }

    public function garbage(){
        $tintuc = TinTuc::with('theloai','loaitin')->onlyTrashed()->get();
        return view('admin.pages.tintuc.garbage',['tintuc' => $tintuc]);
    }

    public function restore($id){
        $post = TinTuc::withTrashed()->where('id',$id)->restore();
        return redirect('dashboard/tin-tuc');
    }

    public function delete($id){
        $post =TinTuc::withTrashed()->where('id', $id)->forceDelete();
        return redirect('dashboard/tin-tuc/garbage');
    }
}
