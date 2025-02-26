@extends('admin.layout_admin')
@section('tieude')
Chỉnh sửa người dùng
@endsection
@section('noidungchinh')
<form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" class="col-md-10">
    @csrf
    @method('PUT')
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Chỉnh sửa người dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="userImage" class="form-label">Hình Ảnh</label>
                            <input type="file" name="hinh" class="form-control">
                            <img src="{{ $user->image }}" alt="Hình người dùng" width="100">
                            <input type="hidden" name="hinhcu" value="{{ $user->image }}">
                        </div>
                        <div class="mb-3">
                            <label for="userName" class="form-label">Tên Người Dùng</label>
                            <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="mb-3">
                                    <label for="userEmailPart1" class="form-label">Tên Email</label>
                                    <input type="text" id="email_part1" name="email_part1" class="form-control" required value="{{ strstr($user->email, '@', true) }}">
                                    @error('email_part1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                            <label for="userPhone" class="form-label">Số Điện Thoại</label>
                            <input type="tel" name="phone" class="form-control" required value="{{ $user->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="userAddress" class="form-label">Địa Chỉ</label>
                            <input type="text" name="address" class="form-control" required value="{{ $user->address }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="userRole" class="form-label">Vai Trò</label>
                            <select name="role" class="form-select" required>
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Người dùng</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Nhân viên</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Shipper</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Trạng Thái</label>
                            <select name="status" class="form-select" required>
                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Đã Kích Hoạt</option>
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Vô Hiệu Hóa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
