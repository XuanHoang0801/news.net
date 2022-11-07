@extends('admin.home')
@section('title', 'Quản lý tài khoản quản trị')
@section('url', '/ tai-khoan')

    

@section('content')

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên đăng nhập</th>
        <th scope="col">Email</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php $stt=1 ?>
      @foreach ($user as $cot)
          
      <tr>
        <th scope="row">{{$stt++}}</th>
        <td>{{$cot->name}}</td>
        <td>{{$cot->email}}</td>

        <td>
          <a href="dashboard/tai-khoan/cap-nhat/{{$cot->id}}"><i class="fa-solid fa-pen"></i></a>
          <span>|</span>
          <form action="dashboard/tai-khoan/xoa/{{$cot->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Xóa</button>
          </form>
          {{-- <a onclick ="return confirm('Bạn chắc chắn muốn xóa loại tin này không?')" href="dashboard/tai-khoan/xoa/{{$cot->id}}"><i class="fa-solid fa-trash"></i></a> --}}
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
    
@endsection