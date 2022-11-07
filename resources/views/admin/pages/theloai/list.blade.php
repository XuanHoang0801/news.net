@extends('admin.home')
@section('title', 'Quản lý thể loại')
@section('url', '/ the-loai')

    

@section('content')
<a href="dashboard/the-loai/create" class="btn btn-primary">Thêm mới</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Thể loại</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php $stt=1 ?>
      @foreach ($theloai as $cot)
          
      <tr>
        <th scope="row">{{$stt++}}</th>
        <td>{{$cot->name}}</td>
        <td class="d-flex">
          <a href="dashboard/the-loai/{{$cot->id}}/edit" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
          <span style="margin: 0 3px"></span>
          <form action="dashboard/the-loai/{{$cot->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick ="return confirm('Bạn chắc chắn muốn xóa thể loại này không?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
          {{-- <a onclick ="return confirm('Bạn chắc chắn muốn xóa thể loại này không?')" href="dashboard/theloai/xoa/{{$cot->id}}"><i class="fa-solid fa-trash"></i></a> --}}
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
    
@endsection