<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/assets_ad/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{route('admin.dashboard')}}">Trang quản lý website</a>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    @if (Auth::guard('admin')->check())
                    Chào {{ Auth::guard('admin')->user()->name }}
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="#!">Nhật ký hoạt động</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="/dangxuat">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <a class="nav-link collapsed" href="/admin/admin_binhluan">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                            Quản lý bình luận
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                            Quản lý người dùng
                        </a>
                        <div id="userMenu" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/user">Danh sách người dùng</a>
                                <a class="nav-link" href="/admin/feedback">Phản hồi</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#productMenu" aria-expanded="false" aria-controls="productMenu">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Quản lý sản phẩm
                        </a>
                        <div id="productMenu" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/sanpham">Danh sách sản phẩm</a>
                                <a class="nav-link" href="/admin/sanpham/create">Thêm sản phẩm</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#orderMenu" aria-expanded="false" aria-controls="orderMenu">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Quản lý đơn hàng
                        </a>
                        <div id="orderMenu" class="collapse" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/donhang">Đơn hàng người mua</a>
                                <a class="nav-link" href="/admin/doanhthu">Doanh thu của cửa hàng</a>
                                <a class="nav-link" href="/admin/doanhthuthieu">Doanh thu chưa thanh toán của cửa hàng</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#typeMenu" aria-expanded="false" aria-controls="typeMenu">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Quản lý loại nhà sản xuất
                        </a>
                        <div id="typeMenu" class="collapse" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/loai">Danh sách nhà sản xuất</a>
                                <a class="nav-link" href="/admin/loai/create">Thêm nhà sản xuất</a>
                            </nav>
                        </div>
                    </div>
                </div>
                
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
        
            <main>
                @yield('noidungchinh')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets_ad/js/scripts.js"></script>
</body>
</html>
