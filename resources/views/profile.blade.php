@extends('layout')

@section('tieude')
Thông tin người dùng
@endsection

@section('noidung')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-light">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin cá nhân</h5>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('update_in4') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Mật khẩu hiện tại:</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword" name="current_password" placeholder="Nhập mật khẩu hiện tại">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Mật khẩu mới:</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('pass1') is-invalid @enderror"
                                 id="newPassword" name="pass1" placeholder="Nhập mật khẩu mới" value="{{old('pass1')}}">
                                @error('pass1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                               
                            </div>
                            <div id="passwordFields" class="mt-2" >
                                <input type="password" class="form-control @error('pass2') is-invalid @enderror mt-2"
                                value="{{old('pass2')}}" id="confirmPassword" name="pass2" placeholder="Nhập lại mật khẩu mới">
                                @error('pass2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input type="hidden" name="hinhcu" value="{{ $user->image }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->image }}" class="img-fluid mb-2 rounded" width="300" height="100" alt="Hình sản phẩm hiện tại">
                                <button type="button" class="btn btn-secondary ms-2" id="changeImageBtn" onclick="toggleImageInput()">Thay đổi</button>
                                <input id="imageInput" name="hinh" type="file" class="form-control" style="display: none;">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     function toggleImageInput() {
        var imageInput = document.getElementById('imageInput');
        imageInput.style.display = imageInput.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
