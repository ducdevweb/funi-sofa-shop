<!DOCTYPE html>
  <html lang="vi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tieude')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="stylesheet" href="/assets_ad/css/style.css">
  </head>
  <body>
<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

      <form class="d-flex align-items-center me-3">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Tìm</button>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="Delete_baiviet.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> Tài Khoản
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="BestAdmin.html">Hồ Sơ</a></li>
            <li><a class="dropdown-item" href="{{route('admin.logout')}}">Đăng Xuất</a></li>            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


   
    <div class="container-fluid">
      <div class="row">
        
<!-- Sidebar -->
<div class="col-md-2 p-0 sidebar shadow-sm d-none d-md-block" id="sidebar">
  <div class="d-flex flex-column p-3 bg-dark text-white" style="min-height: 100vh;">
    <!-- Thông tin User -->
    <div class="user-info mb-4 text-center">
      <img src="" alt="User Image" class="rounded-circle user-img mb-3" width="100" height="100">
      <h5 class="mb-0">{{Auth::guard('admin')->user()->name}}</h5>
    </div>
    <hr>
 
    <ul class="nav flex-column mb-auto">
      <li><a href="/admin" class="nav-link"><i class="fa-brands fa-squarespace"></i> Bảng Điều Khiển</a></li>
      <li><a href="/admin/donhang" class="nav-link"><i class="fa-solid fa-truck-fast"></i> Đơn Hàng</a></li>
      <li><a href="/admin/sanpham" class="nav-link"><i class="fa-brands fa-shopify"></i> Sản Phẩm</a></li>
      <li><a href="/admin/user" class="nav-link"><i class="fa-solid fa-user-group"></i> Khách Hàng</a></li>
      <li><a href="/admin/binhluan" class="nav-link"><i class="fa-solid fa-comment"></i> Bình Luận</a></li>
      <li><a href="/admin/vouchers" class="nav-link"><i class="fa-solid fa-ticket"></i> Voucher</a></li>
      <li><a href="/admin/baiviet" class="nav-link"><i class="fa-solid fa-newspaper"></i> Bài viết</a></li>
      <li><a href="/admin/doanhthu" class="nav-link"><i class="fa-brands fa-slack"></i>Thống Kê Doanh Thu</a></li>
      <li><a href="/admin/danhmuc" class="nav-link"><i class="fa-solid fa-window-restore"></i> Danh Mục</a></li>
      <li><a href="/admin/nhasanxuat" class="nav-link"><i class="fa-solid fa-city"></i> Nhà Sản Xuất</a></li>
      <li><a href="/admin/phanhoi" class="nav-link"><i class="fa-solid fa-newspaper"></i> Phản Hồi</a></li>
    </ul>
    
  </div>
</div>


<!-- Nút Toggle Sidebar cho màn hình nhỏ -->
<button class="btn btn-dark d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
  <i class="fa-solid fa-bars"></i> Menu
</button>

<!-- Offcanvas Sidebar cho màn hình nhỏ -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  
  <div class="offcanvas-body">
    <!-- Nội dung Sidebar giống với sidebar lớn -->
    <ul class="nav flex-column mb-auto">
      <li><a href="/admin" class="nav-link active"><i class="fa-brands fa-squarespace"></i> Bảng Điều Khiển</a></li>
      <li><a href="/admin/donhang" class="nav-link"><i class="fa-solid fa-truck-fast"></i> Đơn Hàng</a></li>
      <li><a href="/admin/sanpham" class="nav-link"><i class="fa-brands fa-shopify"></i> Sản Phẩm</a></li>
      <li><a href="/admin/user" class="nav-link"><i class="fa-solid fa-user-group"></i> Khách Hàng</a></li>
      <li><a href="/admin/binhluan" class="nav-link"><i class="fa-solid fa-comment"></i> Bình Luận</a></li>
      <li><a href="/admin/vouchers" class="nav-link"><i class="fa-solid fa-ticket"></i> Voucher</a></li>
      <li><a href="/admin/baiviet" class="nav-link"><i class="fa-solid fa-newspaper"></i> Bài viết</a></li>
      <li><a href="/admin/doanhthu" class="nav-link"><i class="fa-brands fa-slack"></i>Thống Kê Doanh Thu</a></li>
      <li><a href="/admin/danhmuc" class="nav-link"><i class="fa-solid fa-newspaper"></i> Danh Mục</a></li>
      <li><a href="/admin/nhasanxuat" class="nav-link"><i class="fa-solid fa-newspaper"></i> Nhà Sản Xuất</a></li>
      <li><a href="/admin/phanhoi" class="nav-link"><i class="fa-solid fa-newspaper"></i> Phản Hồi</a></li>

    </ul>
  </div>
</div>

@yield('noidungchinh')
  
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  </body>
  </html>
