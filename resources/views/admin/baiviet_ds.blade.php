@extends('admin.layout_admin')

@section('tieude')
    Quản lý bài viết
@endsection

@section('noidungchinh')
<div class="col-md-10 p-4">

    <div class="row mb-4">
    <form action="{{ route('baiviet.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Tất Cả Bài Viết</h5>
                    <p class="card-text">{{ $baiviet }} Bài Mới</p>
                </div>
                <i class="fa-solid fa-user-group"></i>
            </div>
            <button type="submit" class="btn btn-light">Lọc</button>
            <input type="hidden" name="filter" value="all">
        </div>
    </form>
    <form action="{{ route('baiviet.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white btn-orange">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Bài Viết Trong Ngày</h5>
                    <p class="card-text">{{ $baiviet_now }} Bài Mới</p>
                </div>
                <i class="fa-solid fa-user-group"></i>
            </div>
            <button type="submit" class="btn btn-light">Lọc</button>
            <input type="hidden" name="filter" value="today">
        </div>
    </form>

    <form action="{{ route('baiviet.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Bài Viết Hôm Qua</h5>
                    <p class="card-text">{{ $baiviet_yesterday}} Bài viết</p>
                </div>
                <i class="fa-solid fa-user-group"></i>
            </div>
            <button type="submit" class="btn btn-light">Lọc</button>
            <input type="hidden" name="filter" value="yesterday">
        </div>
    </form>

    <form action="{{ route('baiviet.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Bài Viết Trong Tháng</h5>
                    <p class="card-text">{{ $baiviet_month }} Bài Mới</p>
                </div>
                <i class="fa-solid fa-lock"></i>
            </div>
            <button type="submit" class="btn btn-light">Lọc</button>
            <input type="hidden" name="filter" value="this_month">
        </div>
    </form>

   
</div>

    <form action="{{ route('baiviet.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="hidden" name="filter" value="search"> 
        <input type="text" name="search" class="form-control" placeholder="Tiêu đề bài viết">
        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
    </div>
</form>
<form action="{{route('baiviet.index')}}" method="GET" class="row mb-4 align-items-end">
        <div class="col-lg-4">
            <label for="ngay_from" class="form-label">Chọn Ngày Bắt Đầu:</label>
            <input type="date" name="ngay_from" class="form-control" id="ngay_from" value="{{ request('ngay_from') }}">
        </div>
        <div class="col-lg-4">
            <label for="ngay_to" class="form-label">Chọn Ngày Kết Thúc:</label>
            <input type="date" name="ngay_to" class="form-control" id="ngay_to" value="{{ request('ngay_to') }}">
        </div>
        <div class="col-lg-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Xem</button>
        </div>
    </form>
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Danh Sách Bài Viết</h4>
        <a href="{{ route('baiviet.create') }}"><button class="btn btn-light">Thêm bài viết mới</button></a>
    </div>
    @if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
    <div class="card-body">
        <table class="table table-hover table-responsive" id="productTable">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tiêu Đề Bài Viết</th>
                    <th>Tác Giả</th>
                    <th>Hình Ảnh</th>
                    <th>Ngày Đăng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($baiviet_arr as $baiviet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $baiviet->tieu_de }}</td>
                        <td>{{ $baiviet->tac_gia }}</td>
                        <td><img src="{{ $baiviet->hinh_bv }}" alt="" style="width: 50px; height: auto;"></td>
                        <td>{{ $baiviet->ngay_dang }}</td>
                        <td>
                            <a href="{{ route('baiviet.show', $baiviet->id_bv) }}" class="btn btn-sm btn-primary">Xem</a>
                            <form action="{{ route('baiviet.destroy', $baiviet->id_bv) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
