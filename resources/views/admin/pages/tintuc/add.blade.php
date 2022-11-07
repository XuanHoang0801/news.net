@extends('admin.home')
@section('title', 'Thêm tin tức mới')
@section('url', '/ tin-tuc / them')

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
<div class="container">

    <form action="dashboard/tin-tuc" method="post" enctype="multipart/form-data" style="overflow-y: auto; height: 500px">
        @csrf
       
        <div class="form-body d-flex">
    
            <div class="form-main ">
                
                <div class="form-lable">
                    <label for="" class="mb-2">Tiêu đề bài viết: </label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tiêu đề..."><br>
                </div>
    
                <div class="mb-3 col-4  d-flex">
                    <label for="" class="form-lable col-3">Thể loại: </label>
                   
                    <select class="form-select" aria-label="Default select example" name="theloai" id="theloai">
                        <option selected>Hãy chọn thể loại...</option>
            
                        @foreach ($theloai as $tl)
                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                            
                        @endforeach
                        
                      </select>
                </div>
            
                <div class="mb-3   col-4 d-flex">
                    <label for="" class="form-lable col-3">Loại tin: </label>
                   
                    <select class="form-select" aria-label="Default select example" name="loaitin" id="loaitin">
                        <option selected>Hãy chọn loại tin...</option>
            
                        @foreach ($loaitin as $tl)
                        <option value="{{$tl->id}}">{{$tl->ten_lt}}</option>
                            
                        @endforeach
                        
                      </select>
                </div>
            
                <div class="mb-3 ">
                    <label for="" class="form-lable">Nội dung bài viết: </label>
                    <textarea id="content" class="ckeditor"name="noidung"  cols="10" rows="10" placeholder="Nhập nội dung bài viết..."></textarea>
                </div>
            </div>
        
            <div class="form-main ">
        
                {{-- <div class="mb-3 col-3">
                    <label for="" class="form-lable">Thể loại: </label>
                   
                    <select class="form-select" aria-label="Default select example" name="theloai" id="theloai">
                        <option selected>Hãy chọn thể loại...</option>
            
                        @foreach ($theloai as $tl)
                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                            
                        @endforeach
                        
                      </select>
                </div>
            
                <div class="mb-3 col-3">
                    <label for="" class="form-lable">Loại tin: </label>
                   
                    <select class="form-select" aria-label="Default select example" name="loaitin" id="loaitin">
                        <option selected>Hãy chọn loại tin...</option>
            
                        @foreach ($loaitin as $tl)
                        <option value="{{$tl->id}}">{{$tl->ten_lt}}</option>
                            
                        @endforeach
                        
                      </select>
                </div> --}}
                <div class="mb-3 ">
                    <label class="form-lable mb-3">Ảnh đại diện</label>
                    <input type="file" name="file" id="imageFile"  onchange= "chooseFile(this)"  class="form-control col-4">
                    <img src="assets/img/img.png" alt="" srcset="" width="100" id="image" class="mt-3">
            
                </div>
                <div class="form-group md-3 text-end">
    
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="dashboard/tin-tuc" class="btn btn-danger">Trở về</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script>
    function chooseFile(fileInput)
    {
      if(fileInput.files && fileInput.files[0])
      {
        var reader = new FileReader();
  
        reader.onload = function (e)
        {
          $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  </script>
@endsection
