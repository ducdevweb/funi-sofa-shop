@extends('users.layout')
@section('tieude')
Trang đăng nhập
@endsection
@section('noidung')
<section class="middle">
      <div class="container">
        <div class="row align-items-start justify-content-between container row">
    
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mgl">
            <form class="form" method="post" action="{{route('users.check')}}">
                @csrf
              <div class="card">
                <div class="card-header">
                  Đăng nhập
                </div> 
           
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">Email của bạn</label>
                     <input type="text" name="email" id="id"
                     formControlName="email"
                      class="form-control" placeholder="Nhập email của bạn" aria-describedby="idHelpId">
                   
                  </div>
                  <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="name"
                    formControlName="password"
                     class="form-control" placeholder="Nhập mật khẩu" aria-describedby="nameHelpId">
                    
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary bg-dark text-light">Đăng nhập</button>
                  </div>
                  <div class="">
                      <a href="quenmatkhau.html" class="text-primary">Forgot password?</a>
                  </div>
                  <div> Bạn chưa có tài khoản ?  
                      <a href="/godatviet/register">Đăng ký</a>
                      
                    </div>
                  <a href=""></a>
                </div>
              </div>
            </form>
          </div>
    
    
        </div>
      </div>
    </section>
@endsection