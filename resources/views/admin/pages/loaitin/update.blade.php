@extends('admin.home')
@section('title', 'Cập nhật loại tin')
@section('url', '/ loai-tin / cap-nhat')

@section('content')
    
<form action="dashboard/loai-tin/{{$loaitin->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group d-flex">

        <label for="" class="col-1">Tên loại tin: </label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên loại tin..." value="{{$loaitin->ten_lt}}"><br>
    </div>

    <div class="form-group d-flex">
        <label for="" class="col-1">Thể loại: </label>
       
        <select class="form-select" aria-label="Default select example" name="theloai">
            <option value="{{$loaitin->id_tl}}">{{$loaitin->theloai->name}}</option>

            @foreach ($theloai as $tl)
            <?php
                if ($loaitin->id_tl == $tl->id) {
                     echo Null;
                }
                else{
            ?>
            <option value="{{$tl->id}}">{{$tl->name}}</option>
                <?php } ?>
            @endforeach
            
          </select>
    </div>
    <div class="form-group mt-3">

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="dashboard/loai-tin" class="btn btn-danger">Trở về</a>
    </div>

</form>
@endsection
