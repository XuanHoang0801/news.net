@extends('admin.home') 
@section('title', 'Bài viết đã xóa')
@section('url', '/ tin-tuc/garbage')

    

@section('content')
<div class="d-flex justify-content-between">
  {{-- <a href="dashboard/tin-tuc/create" class="btn btn-primary">Thêm mới</a> --}}
  {{-- <a href="dashboard/tin-tuc/garbage" class="btn btn-warning">Bài viết đã xóa</a> --}}
</div>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col" class="text-center">STT</th>
        <th scope="col" >Tiêu đề</th>
        <th scope="col">Thể loại</th>
        <th scope="col">Loại tin</th>
        <th scope="col">Người đăng</th>
        <th scope="col" class="text-center">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php $stt=1 ?>
      @foreach ($tintuc as $cot)
          
      <tr>
        <th scope="row" class="text-center">{{$stt++}}</th>
        <td>
          <img src="assets/img/{{$cot->img}}" alt="" srcset="" width="40">
          {{$cot->title}}
        </td>
        <td>{{$cot->theloai->name}}</td>
        <td>{{$cot->loaitin->ten_lt}}</td>
        <td>{{$cot->users->name}}</td>



        <td class="text-center d-flex">
          <a onclick ="return confirm('Bạn chắc chắn muốn khôi phục bài viết này không?')" href="dashboard/tin-tuc/restore/{{$cot->id}}" class="btn btn-success"><i class="fa-solid fa-arrow-rotate-left"></i></i></a>
          <span style="margin: 0 3px"></span>
          <form action="dashboard/tin-tuc/delete/{{$cot->id}}" method="post">
            @csrf
            <button type="submit" onclick ="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn bài viết này không?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
    <div class="pagination justify-content-center">
      {{-- {{$tintuc->links('vendor.pagination.bootstrap-4')}} --}}
    </div>
    <a href="dashboard/tin-tuc" class="btn btn-danger">Trở về</a>
@endsection