@extends('admin.home')
@section('title', 'Quản lý loại tin')
@section('url', '/ loai-tin')

    

@section('content')
<a href="dashboard/loai-tin/create" class="btn btn-primary">Thêm mới</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Loại tin</th>
        <th scope="col">Thể loại</th>

        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php $stt=1 ?>
      @foreach ($loaitin as $cot)
          
      <tr>
        <th scope="row">{{$stt++}}</th>
        <td>{{$cot->ten_lt}}</td>
        <td>{{$cot->theloai->name}}</td>

        <td class="d-flex">
          <a href="dashboard/loai-tin/{{$cot->id}}/edit" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
          <span style="margin: 0 3px"></span>
          <form action="dashboard/loai-tin/{{$cot->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick ="return confirm('Bạn chắc chắn muốn xóa loại tin này không?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
    
@endsection