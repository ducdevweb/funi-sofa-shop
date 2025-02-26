<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/order.css">
    <link rel="stylesheet" href="assets/css/shipper.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>
  <body>
    <!-- Header với Menu Điều Hướng -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-light">
              <!-- ***** Logo Start ***** -->
              <a href="shipper.html" class="navbar-brand">
                <h1>Hệ thống giao hàng</h1>
              </a>
              <!-- ***** Logo End ***** -->

              <!-- Nút toggle cho mobile -->
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <!-- ***** Menu Start ***** -->
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto nav" >
                  <li class="nav-item">
                    <a href="/godatviet/shipper" class="nav-link active">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a href="/godatviet/shipper/donhangdanggiao" class="nav-link"
                      >Đơn hàng đang giao</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="/godatviet/shipper/donhangdagiao" class="nav-link"
                      >Đơn hàng đã giao</a
                    >
                  </li>
                </ul>
              </div>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>

    @yield('noidungchinh')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
