<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/sanpham.css">

  <link href="/assets/css/tiny-slider.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">
  <title>@yield('tieude', 'Trang chủ')</title>
</head>
<style>
.user-icon {
  position: relative;
  display: flex;
  align-items: center;
}

.user-icon img {
  width: 24px;
  height: 24px;
}

.user-icon .username {
  margin-left: 10px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 12px;
  color: #fff;
  background: #000;
  padding: 2px 5px;
  border-radius: 3px;
}

.cart-icon {
  position: relative;
  display: flex;
  align-items: center;
}

.cart-icon img {
  width: 24px;
  height: 24px;
}

.cart-icon .item-count {
  position: absolute;
  top: -10px;
  right: -10px;
  background: red;
  color: #fff;
  border-radius: 50%;
  padding: 2px 5px;
  font-size: 12px;
  font-weight: bold;
}
.footer-section {
  background-color: #f8f9fa;
  padding: 20px;
  position: relative;
}
.khoangtrang{
  height: 200px;
}
</style>
<body>
<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Thanh điều hướng Furni">
  <div class="container">
    <a class="navbar-brand" href="/admin">Furni<span>.</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
        <li><a class="nav-link" href="/shop">Cửa hàng</a></li>
        <li><a class="nav-link" href="/vechungtoi">Về chúng tôi</a></li>
        <li><a class="nav-link" href="/dichvu">Dịch vụ</a></li>
        <li><a class="nav-link" href="/blog">Bài viết</a></li>
        <li><a class="nav-link" href="/lienhe">Liên hệ</a></li>
      </ul>
      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        @php
        if (Auth::check()) {
          $user = Auth::user();
        }
        @endphp
        @if(isset($user))
        <li class="nav-item dropdown user-icon">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/assets/images/user.svg" alt="Biểu tượng người dùng">
            <span class="username">{{ $user->name }}</span>
            <div><img src="{{$user->image}}" alt="" width="20" height="20"></div>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">Trang cá nhân</a></li>
            <li><a class="dropdown-item" href="/orders">Đơn hàng</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/dangxuat">Đăng xuất</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/dangnhap">Đăng nhập</a>
        </li>
        @endif
        <li class="nav-item cart-icon">
          <a class="nav-link" href="/cart"><img src="/assets/images/cart.svg" alt="Biểu tượng giỏ hàng">
          @if (session()->has('tongsoluong'))
            <span class="item-count">{{ session('tongsoluong') }}</span>
          @else
            <span class="item-count">0</span>
          @endif
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
		<!-- End Header/Navigation -->
 <main>
    @yield('noidung')
 </main>
 <div class="khoangtrang"></div>
		<!-- Bắt đầu phần Footer -->
<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img">
            <img src="/assets/images/sofa.png" alt="Hình ảnh" class="img-fluid">
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class="d-flex align-items-center"><span class="me-1"><img src="/assets/images/envelope-outline.svg" alt="Hình ảnh" class="img-fluid"></span><span>Đăng ký nhận bản tin</span></h3>

                    <form action="#" class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Nhập tên của bạn">
                        </div>
                        <div class="col-auto">
                            <input type="email" class="form-control" placeholder="Nhập email của bạn">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                <p class="mb-4 footer-description">
            Mọi sự thắc mắc của khách hàng sẽ được chúng tôi giải đáp. Quý khách vui lòng liên hệ với chúng tôi qua các kênh thông tin dưới đây hoặc gửi email để được hỗ trợ nhanh chóng và hiệu quả nhất. Chúng tôi luôn sẵn sàng hỗ trợ và cung cấp thông tin cần thiết để bạn có trải nghiệm tốt nhất khi sử dụng dịch vụ của chúng tôi.
        </p>

                <ul class="list-unstyled custom-social">
                    <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Giới thiệu về chúng tôi</a></li>
                            <li><a href="#">Dịch vụ</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Liên hệ với chúng tôi</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Hỗ trợ</a></li>
                            <li><a href="#">Cơ sở kiến thức</a></li>
                            <li><a href="#">Trò chuyện trực tiếp</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Công việc</a></li>
                            <li><a href="#">Nhóm của chúng tôi</a></li>
                            <li><a href="#">Lãnh đạo</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Ghế Nordic</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ghế công thái học</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Bản quyền &copy;<script>document.write(new Date().getFullYear());</script>. Đã được bảo lưu tất cả các quyền. &mdash; Thiết kế với tình yêu bởi <a href="https://untree.co">Untree.co</a> Phân phối bởi <a href="https://themewagon.com">ThemeWagon</a> <!-- Thông tin giấy phép: https://untree.co/license/ -->
                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Điều khoản &amp; Điều kiện</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</footer>

		<script src="/assets/js/bootstrap.bundle.min.js"></script>
		<script src="/assets/js/tiny-slider.js"></script>
		<script src="/assets/js/custom.js"></script>
	</body>

</html>
