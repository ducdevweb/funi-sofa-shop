@extends('admin.layout_admin')

@section('tieude')
Quản lý đơn hàng
@endsection

@section('noidungchinh')

  
<div class="col-md-10 p-4">
 
    <div class="row mb-4">
        <!-- Form 1 - Tổng Đơn Hàng -->
        <form action="{{ route('donhang.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white btn-orange">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="all">
                        <h5 class="card-title">Tổng Đơn Hàng </h5>
                        <p class="card-text">{{$order}} Đơn Hàng</p>
                    </div>
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-light">Xem Đơn Hàng</button>
                </div>
            </div>
        </form>

        <!-- Form 2 - Đơn Hàng Chờ Xác Nhận -->
        <form action="{{ route('donhang.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="comfirm">
                        <h5 class="card-title">Đơn Chờ Xác Nhận</h5>
                        <p class="card-text">{{$order_comfirm}} Đơn Hàng</p>
                    </div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-light">Xem Đơn Hàng</button>
                </div>
            </div>
        </form>

        <!-- Form 3 - Đơn Hàng Đã Xác Nhận -->
        <form action="{{ route('donhang.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="complete">
                        <h5 class="card-title">Đơn Đã Bị Hủy</h5>
                        <p class="card-text">{{$order_del}} Đơn Hàng</p>
                    </div>
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-light">Xem Đơn Hàng</button>
                </div>
            </div>
        </form>

        <!-- Form 4 - Đơn Hàng Chưa Thanh Toán -->
        <form action="{{ route('donhang.index') }}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="unfinished">
                        <h5 class="card-title">Đơn Chưa Thanh Toán</h5>
                        <p class="card-text">{{$order_unfinished}} Đơn hàng</p>
                    </div>
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-light">Xem Đơn Hàng</button>
                </div>
            </div>
        </form>
    </div>
    <h4>Quản Lý Đơn Hàng</h4>

    <form action="{{ route('donhang.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="hidden" name="filter" value="search"> 
        <input type="text" name="search" class="form-control" placeholder="Nhập mã đơn"">
        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
    </div>
</form>


<form action="{{route('donhang.index')}}" method="GET" class="row mb-4 align-items-end">
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
    @if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
    <div class="comment-container" id="commentContainer">
        <div class="comment">
            <form>
                <div class="row mb-4">
                    <div class="container mt-4">
                        <div class="card-header">
                            <div class="card-body">
                                <table class="table table-hover table-responsive">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 15%;">Tên Khách Hàng</th>
                                            <th class="text-center" style="width: 10%;">Mã Đơn</th>
                                            <th class="text-center" style="width: 10%;">SDT</th>
                                            <th class="text-center" style="width: 15%;">Địa chỉ</th>
                                            <th class="text-center" style="width: 10%;">Thanh Toán</th>
                                            <th class="text-center" style="width: 10%;">Trạng Thái</th>
                                            <th class="text-center" style="width: 10%;">Hình Thức</th>
                                            <th class="text-center" style="width: 10%;">Ngày Đặt</th>
                                            <th class="text-center" style="width: 10%;">Ghi Chú</th>
                                            <th class="text-center" style="width: 5%;">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($donhang)>0)
                                        @foreach($donhang as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->tenNguoiNhan }}</td>
                                            <td>{{ $item->maDon }}</td>
                                            <td>{{ $item->soDienThoai }}</td> 
                                            <td>{{ $item->diaChi }}</td>
                                            <td>
                                                @if($item->thanhToan == 1)
                                                    <span class="badge bg-success">Đã thanh toán</span>
                                                @else
                                                    <span class="badge bg-warning">Chưa thanh toán</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->trangThai == 0)
                                                    <span class="badge bg-danger">Chờ Xác Nhận</span>
                                                @elseif ($item->trangThai == 1)
                                                    <span class="badge bg-warning">Đã Xác Nhận</span>
                                                @elseif ($item->trangThai == 2)
                                                    <span class="badge bg-info">Đang Vận Chuyển</span>
                                                @else
                                                    <span class="badge bg-success">Đã Giao Hàng</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->Hinh_thuc == 0 ? 'Tiền Mặt' : 'Chuyển Khoản' }}</td> 
                                            <td>{{ \Carbon\Carbon::parse($item->ngayMua)->format('d-m-Y') }}</td>
                                            <td>{{ $item->ghiChu }}</td>
                                            <td class="text-center">
                                                <span class="d-flex justify-content-center">
                                                    <a class="btn btn-sm btn-danger me-2" href="{{ route('donhang.show', $item->id_dh) }}">Xem</a>
                                                    <a href="{{route('verify_order',$item->id_dh)}}" class="btn btn-sm btn-danger">Xác nhận</a>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                            @else
                                            <tr>
                                                <td colspan="11" class="text-center">Không có đơn hàng này</td> 
                                            </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
