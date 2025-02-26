@extends('shipper.layout_ship')
@section('noidungchinh')

<div class="container mt-4">
    <h1>Đơn hàng đã giao</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hình ảnh cung cấp</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donHangs as $donHang)
                <tr>
                    <td>{{ $donHang->maDon }}</td>
                    <td>{{ $donHang->nguoiNhan }}</td>
                    <td>{{ $donHang->diaChi }}</td>
                    <td>{{ $donHang->soDienThoai }}</td>
                    <td>
                        <img src="" alt="">
                    </td>
                    <td>
                        <span class="badge bg-primary">Đã giao</span>
                    </td>
                    <td>
                    <a href="{{ route('shipper.chitietdon', ['id_dh' => $donHang->id_dh]) }}" class="btn btn-primary">Xem chi tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
