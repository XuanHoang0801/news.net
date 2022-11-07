<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS.NET</title>
    <base href="{{asset("")}}">
    <link href = "https: //fonts.googleapis.com/css2? family = Roboto: ital, wght @ 0,100; 0,300; 0,400; 0,600; 0,700; 1,100 & display = swap "rel =" stylesheet ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" ntegrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="album.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="reponsive.css">


</head>
<body>
    <div id="wrapper">
        <!-- header -->
        <div id="header " class="bg-primary">
            <div class="header-body container d-flex  justify-content-between ">
                <div class="logo">
                    <a href="./">
                      <img src="assets/img/logo.jpg" alt="" srcset="" width="100">
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <h3 class="animate-charcter"> NEWS.NET</h3>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="navbar">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <div class="container-fluid">
                          <a class="navbar-brand text-white" href="#">Trang chủ</a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                              {{-- @foreach ($theloai as $nav)
                                  
                              <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="danhmuc-{{$nav->id}}">{{$nav->name}}</a>
                              </li>
                              @endforeach --}}
                              <li class="nav-item">
                                <a class="nav-link" href="#">Dân cư</a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 Ban hội
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="#">Hội cựu chiến binh</a></li>
                                  <li><a class="dropdown-item" href="#">Hội Phụ nữ </a></li>
                                  <li><a class="dropdown-item" href="#">Hội nông dân</a></li>
                                  <li><a class="dropdown-item" href="#">Hội người cao tuổi</a></li>

                                </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link " href="#contact"  aria-disabled="true">Liên hệ</a>
                              </li>
                              @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login">Đăng nhập</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            </ul>
                           
                          </div>
                        </div>
                      </nav>
                </div>
            </div>
        </div>
         <!-- content -->
        <div id="content " class="container content">
            @yield('content')

            
        
    </div>
    <!-- footer -->
    <div id="footer">
      <div class="footer-body bg-secondary text-center">
        <span>Thiết kế bởi Nguyễn Xuân Hoàng - @2022</span>
      </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="./assets/js/time.js"></script>
<script>
   var $overlay = $('<div id="overlay"></div>');
    var $image = $("<img>");

    //An image to overlay
    $overlay.append($image);

    //Add overlay
    $("body").append($overlay);

    //click the image and a scaled version of the full size image will appear
    $("#photo-gallery a").click( function(event) {
        event.preventDefault();
        var imageLocation = $(this).attr("href");

        //update overlay with the image linked in the link
        $image.attr("src", imageLocation);

        //show the overlay
        $overlay.show();
    } );

    $("#overlay").click(function() {
        $( "#overlay" ).hide();
    });
</script>
</html>