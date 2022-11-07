@extends('welcome')
@section('content')
<!-- news hot -->
<div class="new-hot container mb-3">
    <div class="hot-body ">
      <h4 class="h4">Tin Tức Nổi Bật</h4>
    </div>

    <div class="hot-content" style="width:45%">
        <div class="marquee">
            <div>
                {{-- @foreach ($tintuc as $cot)
                    
                <span>{{$cot->title}}</span>
                @endforeach --}}
            
            </div>
        </div>
    </div>
    <form class=" search-body">
      <input class="form-control " type="search" placeholder="Nhập để tìm kiếm..." aria-label="Search">
      <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="time">
        <div class="clock-icon" style="margin:0 5px ;">

            <i class="fa-solid fa-clock"></i>
        </div>
        <div id="hour" class="hour">00</div>
        <div  class="space">:</div>
        <div id="minutes" class="minutes">00</div>
        <div class="space">:</div>
        <div id="seconrd"class="seconrd">00</div>
        <div class="space" style="margin:0 5px ;"></div>
        <div id="date"class="date">00</div>
        <div class="space">/</div>
        <div id="month" class="month">00</div>
        <div class="space">/</div>
        <div id="year" class="year">00</div>



    </div>
</div>

<!-- slider -->
{{-- <div id="slider " class=" slider container ">
    <div id="carouselExampleControls" class="carousel slide"   data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/img/1.jpg" class="d-block img-slider  " alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/2.jpg" class="d-block img-slider" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- album -->

    <div id="photos">
        <ul id="photo-gallery">
          <li>
            <a href="./assets/img/12.jpg">
              <img src="./assets/img/12.jpg">
            </a>
          </li>
        </ul>
      </div>
</div> --}}

<!-- main -->
<div class="main">
 

  
    <!-- có thể bạn chưa đọc -->
  <div class="d-block" style="margin-top: 20px;">
    <div class="new-hot" width="80%">
      <div class="hot-body ">
        <h5 class="h5">Chuyên mục</h5>
      </div>
    </div>
    <div class="row ">
      @foreach ($tintuc as $tl)
          
      <a class="col" href="tin-tuc/{{$tl->id}}">
        <div class="card">
          <img src="./assets/img/{{$tl->img}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$tl->title}}</h5>
          </div>
        </div>
      </a>
      @endforeach
      
    </div>
  </div>

</div>

<!-- sidebar -->
{{-- <div class="sidebar">
              
    <div class="container">
      <div class="new-hot" width="80%">
        <div class="hot-body ">
          <h6 class="h6">Tin liên quan</h6>
        </div>
      </div>
      @foreach ($tintuc as $sb)
          
      <a class="sidebar-body" href="tin-tuc/{{$sb->id}}">
        
        <div class="card mb-3"  >
          <div class="row g-0 d-block">
            <div class="col d-flex">
              <img src="./assets/img/{{$sb->img}}" class="img-fluid rounded-start" alt="...">
              <div class="card-body">
                <h5 class="card-title card-title--sidebar">{{$sb->title}}</h5>
                <p class="card-text"><small class="text-muted">{{$sb->updated_at}}</small></p>
              </div>
            </div>
            
            
            </div>
          </div>
        </a>
      @endforeach
       

        <div class="new-hot" width="80%">
          <div class="hot-body ">
            <h6 class="h6">Chuyên mục</h6>
          </div>
        </div>
        <div class="sidebar-body">

          <div class="card mb-3 body-sidebar" >
            <div class="row g-0 d-block">
              @foreach ($theloai as $list)
                  
              <h6 class="card-title card-title--category">{{$list->name}}</h6>
              @endforeach
             

                  
            </div>
          </div> --}}
      </div>

      <div class="new-hot" width="80%">
        <div class="hot-body ">
          <h6 class="h6">Lịch</h6>
        </div>
      </div>
      <div class="sidebar-body">

        <div class="card mb-3 body-sidebar" >
          <div class="row g-0 d-block">
            
            <iframe src="https://calendar.google.com/calendar/embed?src=nguyenxuanhoang2000%40gmail.com&ctz=Asia%2FHo_Chi_Minh" style="border: 0" width="800" height="300" frameborder="0" scrolling="no"></iframe>
                
          </div>
        </div>
    </div>
    </div>

    
  </div>

  <!-- contact -->
  <div id="contact"></div>
</div>


@endsection
