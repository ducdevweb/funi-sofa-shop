@extends('admin.layout_admin')

@section('tieude', 'Báo Cáo Doanh Thu')

@section('noidungchinh')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Báo Cáo Doanh Thu</h2>
        </div>

        <div class="card-body">
            <!-- Form lọc doanh thu -->
            <form action="{{ route('doanhthu') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ngay_from">Từ ngày</label>
                            <input type="date" id="ngay_from" name="ngay_from" class="form-control" value="{{ request('ngay_from') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ngay_to">Đến ngày</label>
                            <input type="date" id="ngay_to" name="ngay_to" class="form-control" value="{{ request('ngay_to') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Lọc</button>
                    </div>
                </div>
            </form>

            <h4>Tổng Doanh Thu: {{ number_format($tongdoanhthu, 0, ',', '.') }} VNĐ</h4>

            <table class="table table-bordered mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doanhthu as $thongtin)
                    <tr>
                        <td>{{ $thongtin->ten_sp }}</td>
                        <td><img src="{{ $thongtin->hinh }}" alt="" width="200" height="100"></td>
                        <td>{{ number_format($thongtin->soLuong, 0, ',', '.') }}</td>
                        <td>{{ number_format($thongtin->gia_sp, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format($thongtin->thanh_tien, 0, ',', '.') }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
