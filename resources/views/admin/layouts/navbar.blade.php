<div class="navbar d-flex bg-primary">
    <div class="container">
        
        <div class="links">
            <span>Dashboarh</span>
            <span class="fw-light">@yield('url')</span>
        </div>
        <div class="btn-group dropstart">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="dashboard/tai-khoan/thong-tin">Thông tin</a></li>
              <li><a class="dropdown-item" href="dashboard/logout">Đăng xuất</a></li>
             
            </ul>
          </div>
    </div>
</div>