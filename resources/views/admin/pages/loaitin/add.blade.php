@extends('admin.home')
@section('title', 'Thêm loại tin mới')
@section('url', '/ loai-tin / them')

@section('content')
    
<form action="dashboard/loai-tin" method="post">
    @csrf
    <div class="form-group">
        <label for="">Tên loại tin: </label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên loại tin..."><br>
    </div>

    <div class="form-group">
        <label for="">Thể loại: </label>
       
        <select class="form-select" aria-label="Default select example" name="theloai">
            <option selected>Hãy chọn thể loại...</option>

            @foreach ($theloai as $tl)
            <option value="{{$tl->id}}">{{$tl->name}}</option>
                
            @endforeach
            
          </select>
    </div>
    <div class="form-group mt-3">

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="dashboard/loai-tin" class="btn btn-danger">Trở về</a>
    </div>

</form>
@endsection
