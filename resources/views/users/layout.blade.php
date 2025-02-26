<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>@yield('tieude')</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="/assetss/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assetss/css/footer.css">
  <link rel="stylesheet" href="/assetss/css/header.css">
  <link rel="stylesheet" href="/assetss/css/detail.css">
  <link rel="stylesheet" href="/assetss/css/properties.css">
  <link rel="stylesheet" href="/assetss/css/gioithieu.css">
  <link rel="stylesheet" href="/assetss/css/login.css"> 
  <link rel="stylesheet" href="/assetss/css/dropdown.css"> 
  <link rel="stylesheet" href="/assetss/css/cart.css">
  <link rel="stylesheet" href="/assetss/css/voucher2.css">
  <link rel="stylesheet" href="/assetss/css/checkout.css">
  
  <!-- Additional CSS Files -->
  
  <link rel="stylesheet" href="/assetss/css/fontawesome.css">
  <link rel="stylesheet" href="/assetss/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="/assetss/css/owl.css">
  <link rel="stylesheet" href="/assetss/css/index.css">
  <link rel="stylesheet" href="/assetss/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--


-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container new">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/godatviet/home_us" class="logo">
              <h1>GỖ ĐẤT VIỆT</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->

            <ul class="nav">
              <li><a href="/godatviet/home_us">Trang chủ</a></li>
              <li><a href="/godatviet/shop">Sản phẩm</a></li>
              <li><a href="/godatviet/article">Bài viết </a></li>
              <li><a href="/godatviet/feedback">Phản hồi</a></li>


 
              <li class="dropdown">
                <a href="#" class="dropdown-toggle"><i class="fa-regular fa-user "  style="font-size: 30px; margin-top: 4px;" ></i></a>
                <div class="dropdown-menu">
                  @if (!Auth::check())
                  <a href="/godatviet/login">Đăng nhập</a>
                  <a href="/godatviet/register">Đăng ký</a>
                  <a href="/godatviet/logout">Đăng xuất</a>
                  @else
                  <a href="/godatviet/infor">Thông tin</a>
                  <a href="/godatviet/order">Đơn hàng</a>
                  <a href="/godatviet/logout">Đăng xuất</a>
                  <a href="#">Xin chào:{{Auth::guard('web')->user()->name}}</a>
                  @endif
                </div>
              </li>
               <li>
                  <form class="d-flex search-form" role="search">
                <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </form>
              </li>
              <li><a href="/godatviet/Cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>

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
  
  @if(session()->has('thongbao'))
  <div id="full-screen-alert" class="alert alert-success d-flex align-items-center justify-content-center">
    <div class="text-center">
      <i class="fa fa-check-circle fa-5x"></i>
      <h1>{{ session('thongbao') }}</h1>
    </div>
  </div>
  
  <style>
    #full-screen-alert {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 128, 0, 0.8);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
      transition: opacity 1s ease-out;
    }
  </style>

  <script>
    setTimeout(function() {
      document.getElementById('full-screen-alert').style.opacity = '0';
      setTimeout(function() {
        document.getElementById('full-screen-alert').remove();
      }, 1000);
    }, 1000);
  </script>
  @endif

    @yield('noidung')
    
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



  <!-- Scripts -->

  
  <script src="/assetss/vendor/jquery/jquery.min.js"></script>
  <script src="/assetss/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assetss/js/isotope.min.js"></script>
  <script src="/assetss/js/owl-carousel.js"></script>
  <script src="/assetss/js/counter.js"></script>
  <script src="/assetss/js/custom.js"></script>
  <script src="/assetss/js/dropdown.js"></script>
  <script src="/assetss/vendor/jquery/jquery.min.js"></script>
    <script src="/assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Các tệp JavaScript bổ sung -->
    <script src="/assetss/js/scrollreveal.min.js"></script>
    <script src="/assetss/js/waypoints.min.js"></script>
    <script src="/assetss/js/jquery.counterup.min.js"></script>
    <script src="/assetss/js/imgfix.min.js"></script>
    <script src="/assetss/js/slick.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="/assetss/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


</body>

</html>