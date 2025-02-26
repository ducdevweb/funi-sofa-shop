@extends('shipper.layout_ship')

@section('noidungchinh')


<h5 class="mt-4">Chi tiết đơn hàng</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Đơn hàng</th> <!-- Thêm cột ID Đơn hàng -->
                    <th>ID Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thanh toán</th>
                    <th>Ngày nhận</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chiTietDonHang as $chiTiet)
                        <td>{{ $chiTiet->id_dh }}</td>
                        <td>{{ $chiTiet->id_sp }}</td>
                        <td>{{ $chiTiet->ten_sp }}</td>
                        <td>
                            <img src="" alt="">
                        </td>
                        <td>{{ number_format($chiTiet->gia_sp, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $chiTiet->soLuong }}</td>
                        <td>{{ number_format($chiTiet->gia_sp * $chiTiet->soLuong, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $chiTiet->thanhToan == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</td>
                        <td>{{ $chiTiet->ngayNhan ? \Carbon\Carbon::parse($chiTiet->ngayNhan)->format('d/m/Y H:i') : 'Chưa có' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Tổng tiền -->
    <p class="text-end">
        <strong>Tổng tiền:</strong> {{ number_format($tongTien, 0, ',', '.') }} VNĐ
    </p>
@endsection
