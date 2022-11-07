@extends('admin.home')
@section('title', 'Thêm thể loại mới')
@section('url', '/ the-loai / them')

@section('content')
    
<form action="dashboard/the-loai" method="post">
    @csrf
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
        
    
    <div class="form-group d-flex">

        <label for="" class="col-1">Tên thể loại: </label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên thể loại..."><br>
    </div>
    <div class="form-group mt-3">

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="dashboard/the-loai" class="btn btn-danger">Trở về</a>
    </div>

</form>
@endsection
