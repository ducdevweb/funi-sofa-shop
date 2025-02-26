<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Login Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assetss/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assetss/css/footer.css">
    <link rel="stylesheet" href="/assetss/css/header.css">
    <link rel="stylesheet" href="/assetss/css/index.css">
    <link rel="stylesheet" href="/assetss/css/dropdown.css"> 
    <link rel="stylesheet" href="/assetss/css/login.css"> 
</head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container new">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h1>GỖ ĐẤT VIỆT</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.html">Trang chủ</a></li>
              <li><a href="properties.html">Sản phẩm</a></li>
              <li><a href="property-details.html">Giới thiệu</a></li>
              <li><a href="contact.html">Liên hệ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle"><i class="fa-regular fa-user" style="font-size: 30px; margin-top: 4px;"></i></a>
                <div class="dropdown-menu">
                  <a href="login.html">Đăng nhập</a>
                  <a href="register.html">Đăng ký</a>
                  <a href="taikhoan.html">Thông tin</a>
                  <a href="">Đăng xuất</a>
                </div>
              </li>
              <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Login Section Start ***** -->
  <section class="middle">
      <div class="container">
        <div class="row align-items-start justify-content-between container row">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mgl">
            <form action="{{route('admin.check_login')}}" method="POST" class="form">
			@csrf
					@if ($errors->has('loginErr'))
						<div class="alert alert-danger">
							{{ $errors->first('loginErr') }}
						</div>
					@endif
              <div class="card">
                <div class="card-header">
                  Đăng nhập
                </div> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email của bạn</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email của bạn" aria-describedby="emailHelpId" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" aria-describedby="passwordHelpId" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary bg-dark text-light">Đăng nhập</button>
                  </div>
                  <div class="">
                      <a href="quenmatkhau.html" class="text-primary">Quên mật khẩu?</a>
                  </div>
                  <div> Bạn chưa có tài khoản ?  
                      <a href="register.html">Đăng ký</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
  <!-- ***** Login Section End ***** -->

  <footer class="bg-dark" id="tempaltemo_footer">
    <div class="container app">
      <div class="row">
        <div class="col-md-4 pt-5">
          <h2 class="h2 text-success border-bottom pb-3 border-light logo">GỖ ĐẤT VIỆT</h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li>
              <i class="fas fa-map-marker-alt fa-fw"></i>
              123 Đường Gỗ Tự Nhiên, Thành phố ABC, Mã bưu điện 10660
            </li>
            <li>
              <i class="fa fa-phone fa-fw"></i>
              <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </li>
            <li>
              <i class="fa fa-envelope fa-fw"></i>
              <a class="text-decoration-none" href="mailto:info@noithatgo.com">info@noithatgo.com</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 pt-5">
          <h2 class="h2 text-light border-bottom pb-3 border-light">Sản phẩm</h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li><a class="text-decoration-none" href="#">Bàn ghế gỗ cao cấp</a></li>
            <li><a class="text-decoration-none" href="#">Tủ quần áo gỗ</a></li>
            <li><a class="text-decoration-none" href="#">Giường ngủ gỗ</a></li>
            <li><a class="text-decoration-none" href="#">Kệ gỗ trang trí</a></li>
            <li><a class="text-decoration-none" href="#">Bàn ăn gỗ</a></li>
            <li><a class="text-decoration-none" href="#">Tủ bếp gỗ</a></li>
            <li><a class="text-decoration-none" href="#">Đồ nội thất khác</a></li>
          </ul>
        </div>
        <div class="col-md-4 pt-5">
          <h2 class="h2 text-light border-bottom pb-3 border-light">Thông tin thêm</h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li><a class="text-decoration-none" href="#">Trang chủ</a></li>
            <li><a class="text-decoration-none" href="#">Về chúng tôi</a></li>
            <li><a class="text-decoration-none" href="#">Địa chỉ cửa hàng</a></li>
            <li><a class="text-decoration-none" href="#">Câu hỏi thường gặp</a></li>
            <li><a class="text-decoration-none" href="#">Liên hệ</a></li>
          </ul>
        </div>
      </div>

      <div class="row text-light mb-4">
        <div class="col-12 mb-3">
          <div class="w-100 my-3 border-top border-light"></div>
        </div>
        <div class="col-auto me-auto">
          <ul class="list-inline text-left footer-icons">
            <li class="list-inline-item border border-light rounded-circle text-center">
              <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
            </li>
            <li class="list-inline-item border border-light rounded-circle text-center">
              <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
            </li>
            <li class="list-inline-item border border-light rounded-circle text-center">
              <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
            </li>
            <li class="list-inline-item border border-light rounded-circle text-center">
              <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
            </li>
          </ul>
        </div>
        <div class="col-auto">
          <label class="sr-only" for="subscribeEmail">Địa chỉ email</label>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
