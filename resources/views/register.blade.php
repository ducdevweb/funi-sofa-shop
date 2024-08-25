<!doctype html>
<html lang="vi">
  <head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="/login-form-20/css/style.css">

  </head>
  <body class="img js-fullheight" style="background-image: url(/login-form-20/images/bg.jpg);">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Đăng Ký</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Tạo tài khoản mới</h3>
              <form action="/dangky_" method="post" enctype="multipart/form-data" class="signin-form">
               @csrf
                @if ($errors->has('registrationErr'))
                  <div class="alert alert-danger">
                    {{ $errors->first('registrationErr') }}
                  </div>
                @endif
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{old('name')}}" required>
                  <b class="text-danger"> @error('name') {{ $message }} @enderror </b>
                </div>
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
                  <b class="text-danger"> @error('email') {{ $message }} @enderror </b>
                </div>
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone')}}" required>
                  <b class="text-danger"> @error('phone') {{ $message }} @enderror </b>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Mật khẩu" required>
                  <b class="text-danger"> @error('password') {{ $message }} @enderror </b>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <input id="password-confirm-field" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Xác nhận mật khẩu" required>
                  <b class="text-danger"> @error('password_confirmation') {{ $message }} @enderror </b>
                  <span toggle="#password-confirm-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{old('address')}}" required>
                  <b class="text-danger"> @error('address') {{ $message }} @enderror </b>
                </div>
                <div class="form-group">
                  <input type="file" name="image" class="form-control" placeholder="Hình ảnh" required>
   
                </div>
                <div class="form-group">  
                  <button type="submit" class="form-control btn btn-primary submit px-3">Đăng Ký</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Nhớ tôi
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="w-50 text-md-right">
                    <a href="/dangnhap" style="color: #fff"> Đăng nhập</a>
                  </div>
                </div>
              </form>
              <p class="w-100 text-center">&mdash; Hoặc Đăng Ký Với &mdash;</p>
              <div class="social d-flex text-center">
                <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="/login-form-20/js/jquery.min.js"></script>
    <script src="/login-form-20/js/popper.js"></script>
    <script src="/login-form-20/js/bootstrap.min.js"></script>
    <script src="/login-form-20/js/main.js"></script>

  </body>
</html>
