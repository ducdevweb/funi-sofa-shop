@extends('admin.layout_admin')

@section('tieude')
Quản lý doanh thu
@endsection

@section('noidungchinh')
@if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
<div class="col-md-10 p-4">
    <!-- Cards -->
    <div class="row mb-4">
        <form action="{{route('doanhthu.index')}}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white btn-orange">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="total">
                        <h5 class="card-title">Tổng Doanh Thu Sản Phẩm Đã Bán</h5>
                        <p class="card-text">{{ number_format($tongdoanhthu, 0, ',', '.') }} VNĐ</p>
                    </div>
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <div class="mt-2">
              <button type="submit" class="btn btn-light">Xem Báo Cáo</button>
                </div>
            </div>
        </form>

    
        <form action="{{route('doanhthu.index')}}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="total">
                        <h5 class="card-title">Số Lượng Sản Phẩm Đã Bán Ra</h5>
                        <p class="card-text">{{ $doanhthu->sum('soLuong') }} Sản Phẩm</p>
                    </div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="mt-2">
              <button type="submit" class="btn btn-light">Xem Báo Cáo</button>
                </div>
            </div>
        </form>

        <form action="{{route('doanhthu.index')}}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="unfinished">
                        <h5 class="card-title">Số Sản Phẩm Chưa Thanh Toán</h5>
                        <p class="card-text">{{$sp_unfinished}}</p>
                    </div>
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="mt-2">
              <button type="submit" class="btn btn-light">Xem Báo Cáo</button>
                </div>
            </div>
        </form>

        <form action="{{route('doanhthu.index')}}" method="GET" class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <input type="hidden" name="filter" value="complete">
                        <h5 class="card-title">Số Sản Phẩm Đã Thanh Toán</h5>
                        <p class="card-text">{{$sp_complete}}</p>
                    </div>
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="mt-2">
              <button type="submit" class="btn btn-light">Xem Báo Cáo</button>
                </div>
            </div>
        </form>
    </div>

    <form action="{{route('doanhthu.index')}}" method="GET" class="row mb-4 align-items-end">
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

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Số Lượng Bán Mỗi Sản Phẩm</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive" id="productTable">
                        <thead class="table-primary">
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng Bán</th>
                                <th>Đơn Giá</th>
                                <th>Doanh Thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doanhthu as $thongtin)
                            <tr>
                                <td><img class="small-product-img" src="{{ $thongtin->hinh }}" alt="{{ $thongtin->ten_sp }}" width="100" height="100"></td>
                                <td>{{ $thongtin->ten_sp }}</td>
                                <td>{{ number_format($thongtin->soLuong, 0, ',', '.') }}</td>
                                <td>{{ number_format($thongtin->gia_sp, 0, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($thongtin->thanh_tien, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Tổng tiền:</th>
                                <th>{{ number_format($tongdoanhthu, 0, ',', '.') }} VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
