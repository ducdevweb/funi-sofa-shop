@extends('users.layout')
@section('tieude')
Thông tin người dùng
@endsection
@section('noidung')
<section class="container mt-5 main">
    <h1 class="ttcn">Thông tin cá nhân</h1>
    <div class="row">
        <div class="col-md-3 profile-section">
            <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                <img
                    id="profileImage"
                    src="{{ $user->image ? asset($user->image) : asset('assets/images/user.webp') }}"
                    class="img-fluid profile-picture"
                    alt="Profile Picture"
                />
                <input type="file" name="hinh" id="profileImageUpload" class="form-control mt-3" />
                <input type="hidden" name="hinhcu" value="{{ $user->image }}" />
        </div>
        <div class="col-md-9">
            <div class="form-group mb-3">
                <label for="fullName">Tên</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="fullName"
                    value="{{ old('name', $user->name) }}"
                />
            </div>
            <div class="form-group mb-3">
                <label for="password">Mật khẩu mới</label>
                <input
                    type="password"
                    class="form-control"
                    name="pass1"
                    id="password"
                />
            </div>
            <div class="form-group mb-3">
                <label for="confirmPassword">Xác nhận mật khẩu</label>
                <input
                    type="password"
                    class="form-control"
                    name="pass2"
                    id="confirmPassword"
                />
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    readonly
                />
            </div>
            <div class="form-group mb-3">
                <label for="address">Địa chỉ</label>
                <input
                    type="text"
                    class="form-control"
                    name="address"
                    id="address"
                    value="{{ old('address', $user->address) }}"
                />
            </div>
            <div class="form-group mb-3">
                <label for="phone">Số điện thoại</label>
                <input
                    type="text"
                    class="form-control"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', $user->phone) }}"
                />
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
        </div>
        </form>
    </div>
</section>
@endsection
