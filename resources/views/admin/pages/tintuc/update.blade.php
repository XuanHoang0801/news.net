@extends('admin.home')
@section('title', 'Cập nhật tin tức')
@section('url', 'tin-tuc/cap-nhat')

@section('content')
@if (count($errors) > 0)
<div class=" text-danger">
    @foreach ($errors-> all() as $err)
      {{$err}}<br>
    @endforeach
  </div>
    
  @endif
  
  @if (session('thongbao'))
  <div class="text-success">
  {{session('thongbao')}}
  </div>
  @endif
<form action="dashboard/tin-tuc/{{$tintuc->id}}" method="post" enctype="multipart/form-data" style="overflow-y: auto; height: 500px">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="">Tiêu đề bài viết: </label>
        <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề..." value="{{$tintuc->title}}"><br>
    </div>

    <div class="form-group">
        <label for="">Nội dung bài viết: </label>
        <textarea id="content" class="ckeditor"name="noidung" id="" cols="30" rows="10" placeholder="Nhập nội dung bài viết...">{{$tintuc->nd_tt}}</textarea>
    </div>

    <div class="form-group">
        <label for="">Thể loại: </label>
       
        <select class="form-select" aria-label="Default select example" name="theloai" id="theloai">
            <option value="{{$tintuc->id_tl}}">{{$tintuc->theloai->name}}</option>

            @foreach ($theloai as $tl)
                @if ($tintuc->id_tl == $tl->id)
                @else
                    <option value="{{$tl->id}}">{{$tl->name}}</option>
                
                @endif
                
            @endforeach
            
          </select>
    </div>

    <div class="form-group">
        <label for="">Loại tin: </label>
       
        <select class="form-select" aria-label="Default select example" name="loaitin" id="loaitin">
            <option value="{{$tintuc->id_lt}}">{{$tintuc->loaitin->ten_lt}}</option>


            @foreach ($loaitin as $tl)
            
            <option value="{{$tl->id}}">{{$tl->ten_lt}}</option>
                
            @endforeach
            
          </select>
    </div>

    <div class="form-group">
        <input type="file" name="file" id="imageFile"  onchange= "chooseFile(this)"  class="form-control col-4">
        
        <img src="assets/img/{{$tintuc->img}}" alt="" srcset="" width="100" id="image">

    </div>
    <div class="form-group md-3">

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="dashboard/tin-tuc" class="btn btn-danger">Trở về</a>
    </div>

</form>
@endsection
