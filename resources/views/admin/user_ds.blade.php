@extends('admin.layout_admin')

@section('tieude')
Quản lý người dùng
@endsection

@section('noidungchinh')

<div class="col-md-10 p-4">
      
<div class="row mb-4">
    <!-- Số Người Dùng -->
    <div class="col-lg-4 col-md-6 mb-4">
        <form method="GET" action="{{ route('user.index') }}">
            <div class="card text-white bg-success" style="text-decoration: none;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Số Người Dùng</h5>
                        <p class="card-text">{{ $user_count }} Người dùng</p>
                    </div>
                    <input type="hidden" name="filter" value="all_users">
                    <button type="submit" class="btn btn-light">Xem Tài Khoản</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Khách Mới Trong Tháng -->
    <div class="col-lg-4 col-md-6 mb-4">
        <form method="GET" action="{{ route('user.index') }}">
            <div class="card text-white bg-secondary" style="text-decoration: none;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Khách Trong Tháng</h5>
                        <p class="card-text">{{ $user_new }} Khách Hàng</p>
                    </div>
                    <input type="hidden" name="filter" value="new_users">
                    <button type="submit" class="btn btn-light">Xem Tài Khoản</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tài Khoản Bị Khóa -->
    <div class="col-lg-4 col-md-6 mb-4">
        <form method="GET" action="{{ route('user.index') }}">
            <div class="card text-white bg-warning" style="text-decoration: none;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Tài Khoản Bị Khóa</h5>
                        <p class="card-text">{{ $user_blocks }} Tài Khoản</p>
                    </div>
                    <input type="hidden" name="filter" value="blocked_users">
                    <button type="submit" class="btn btn-light">Xem Tài Khoản</button>
                </div>
            </div>
        </form>
    </div>
</div>


    <div class="row mb-4 align-items-center">
    <div class="col-lg-3 col-md-6 mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center" style="text-decoration: none; padding: 15px; font-size: 18px; width: 100%; border-radius: 8px;">
            <i class="fa-solid fa-plus-circle" style="margin-right: 8px;"></i> Thêm Người Dùng
        </a>
    </div>

    <div class="col-lg-9 col-md-6 mb-4">
        <form method="GET" action="{{ route('user.index') }}">
    <div class="input-group" style="flex: 1; max-width: 60%;">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm người dùng" aria-label="Tìm kiếm người dùng">
        <input type="hidden" name="filter" value="search">
        <button type="submit" class="btn btn-secondary">Tìm Kiếm</button>
    </div>
</form>

<form method="GET" action="{{ route('user.index') }}" style="flex: 1; max-width: 35%; margin-left: 20px;">
    <input type="hidden" name="filter" value="role">
    <select name="role" class="form-control" >
        <option value="" disabled>-- Lọc Theo Vai Trò --</option>
        <option value="">-- Tất cả --</option>
        <option value="1">Khách Hàng</option>
        <option value="2">Nhân viên</option>
        <option value="3">Shipper</option>
    </select>
    <button type="submit" class="btn btn-primary ml-2">Lọc</button>
</form>

    </div>
</div>

@if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Danh Sách Khách Hàng</h4>
    </div>
    <div class="comment-container" id="commentContainer">
        <div class="comment">
            <div class="row mb-4">
                <div class="container mt-4">
                    <div class="card-body">
                        <table class="table table-hover table-responsive" id="productTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>HTTP</th>
                                    <th>Tên</th>
                                    <td>Hình đại diện</td>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Vai trò</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user_arr as $user)
                                    <tr>
                                        <td>{{ $user->id }}
                                        </td>
                                        <td>
                                            @if($user->status == 0)
                                                <span class="badge bg-success">Đã Kích Hoạt</span>
                                            @else
                                                <span class="badge bg-danger">Vô hiệu hóa</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td><img width="40" height="40" src="{{ $user->image }}" alt=""></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            @if ($user->role === 0)
                                                Admin
                                            @elseif($user->role === 1)
                                                Khách Hàng
                                            @elseif($user->role === 2)
                                                Nhân viên
                                            @else
                                                Shipper
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}">
                                                <button class="btn btn-sm btn-primary">Chỉnh Sửa</button>
                                            </a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">Không có khách hàng nào</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
