<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Đăng nhập vào trang quản trị </title>
    <base href="{{asset("")}}">
    {{-- css bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin/css/style.css">
</head>
<body>
    <div id="wreapper" >
        <div id="wreapper" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">ĐĂNG NHẬP VÀO TRANG QUẢN TRỊ</div>
            
                            <div class="card-body">
                                @if (count($errors) > 0)
                                <div class=" text-danger">
                                @foreach ($errors-> all() as $err)
                                    {{$err}}<br>
                                @endforeach
                                </div>
                                
                                @endif

                                @if (session('message'))
                                <div class="text-danger mb-3">
                                {{session('message')}}
                                </div>
                                @endif
                                <form action="dashboard/login" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="form-group d-flex mb-3">

                                                    <label for="" class="col-2">Email: </label>
                                                    <input type="email" name="email" id="" class="form-control" placeholder="Nhập địa chỉ email..." aria-describedby="helpId">
                                                </div>
                                                <div class="form-group d-flex">

                                                    <label for="" class="col-2">Mật khẩu: </label>
    
                                                    <input type="password" name="pass" id="" class="form-control" placeholder="Nhập mật khẩu của bạn..." aria-describedby="helpId">
                                                </div>
                                                <div class="text-center mt-3">

                                                    <button type="submit" class="btn btn-primary ">Đăng nhập</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>