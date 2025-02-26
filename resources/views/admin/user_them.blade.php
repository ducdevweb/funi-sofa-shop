@extends('admin.layout_admin')
@section('tieude')
Thêm người dùng
@endsection

@section('noidungchinh') 

<form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" class="col-md-10">
    @csrf
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Thêm người dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="userImage" class="form-label">Hình Ảnh</label>
                            <input type="file" name="hinh" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="userName" class="form-label">Tên Người Dùng</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmailPart1" class="form-label">Tên Email</label>
                                    <input type="text" id="email_part1" name="email_part1" class="form-control" placeholder="Vui lòng chỉ nhập tên email" required value="{{ old('email_part1') }}">
                                    @error('email_part1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="emailPart1Error" style="color: red; display: none;">Tên email không được chứa ký tự "@".</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Đuôi Email</label>
                                    <input type="text" name="email_part2" class="form-control" value="@gmail.com" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required minlength="6" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="userPhone" class="form-label">Số Điện Thoại</label>
                            <input type="tel" name="phone" class="form-control" required pattern="[0-9]{10,15}" placeholder="Nhập số điện thoại (10-15 số)" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="userAddress" class="form-label">Địa Chỉ</label>
                            <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="userRole" class="form-label">Vai Trò</label>
                            <select name="role" class="form-select" required>
                                <option value="1">Người dùng</option>
                                <option value="2">Nhân viên</option>
                                <option value="3">Shipper</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Trạng Thái</label>
                            <select name="status" class="form-select" required>
                                <option value="0">Kích Hoạt</option>
                                <option value="1">Vô Hiệu Hóa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm Người Dùng</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('email_part1').addEventListener('input', function () {
        const emailInput = this.value;
        const emailError = document.getElementById('emailPart1Error');
        if (emailInput.includes('@')) {
            emailError.style.display = 'block';
        } else {
            emailError.style.display = 'none';
        }
    });
</script>
@endsection
