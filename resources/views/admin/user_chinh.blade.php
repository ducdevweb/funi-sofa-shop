@extends('admin/layout_admin')

@section('tieude', 'Chỉnh Sửa Người Dùng')

@section('noidungchinh')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Chỉnh Sửa Thông Tin Người Dùng</h2>
        </div>
        <div class="card-body">
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $user->password) }}" >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class='col-6 p-2'>
                    <input type="hidden" name="hinhcu" value="{{ $user->image }}">
                    <img src="{{ $user->image }}" width="300" height="100" alt="Hình sản phẩm hiện tại">
                    <input name="hinh" type="file" class="form-control shadow-none border-primary" placeholder="Hình sản phẩm">
                </div> 

                <button type="submit" class="btn btn-success mt-4">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
