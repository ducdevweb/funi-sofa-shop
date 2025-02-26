@extends('users.layout')
@section('tieude')
Trang đăng ký
@endsection
@section('noidung')
<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mgl">
                <form class="form" method="POST" action="{{route('users.check_register')}}" enctype="multipart/form-data">
                    @csrf 
                    <div class="card">
                        <div class="card-header">Đăng ký</div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" name="name" placeholder="Vd: nguyyenvana" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label>số Điện Thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Vd: nguyyenvana" required />
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Email *</label>
                                    <input type="text" class="form-control" name="first_email" placeholder="Nhập tên email" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@gmail.com</label>
                                    <input type="text" class="form-control" name="last_email" value="@gmail.com" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Mật khẩu *</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password*" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nhập lại mật khẩu *</label>
                                    <input type="password" class="form-control" name="rePassword" placeholder="Confirm Password*" required />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của bạn" required />
                            </div>

                            <div class="form-group col-md-12">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control" name="image" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">
                                    Tạo tài khoản
                                </button>
                            </div>
                            <div>
                                Bạn đã có tài khoản? <a href="{{ url('/godatviet/login') }}">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
