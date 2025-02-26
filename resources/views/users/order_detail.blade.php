@extends('users.layout')
@section('tieude')
    Trang chi tiết đơn
@endsection
@section('noidung')
<div id="order-details" class="container mt-5 justify-center">
    <h4>Chi Tiết Đơn Hàng DH</h4>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Ảnh Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Tổng Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_od as $detail)
                <tr>
                    <td>{{ $detail->ten_sp }}</td>
                    <td><img src="{{  $detail->hinh }}" alt="{{ $detail->ten_sp }}" class="product-image" height="200"></td>
                    <td>{{ $detail->soLuong }}</td>
                    <td>{{ number_format($detail->gia_sp, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($detail->thanh_tien, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button-group d-flex justify-content-between mt-3">
        <button type="button" class="btn btn-secondary">Đóng</button>
        <button type="button" class="btn btn-danger">Hủy đơn hàng</button>
    </div>
    <div class="total-payment mt-3">
        <span>Tổng tiền thanh toán: </span> <strong>{{ number_format($tongTien, 0, ',', '.') }} VND</strong>
    </div>
    <ul class="track list-inline mt-3">
        <li class="list-inline-item active"><i class="fa-solid fa-box"></i></li>
        <li class="list-inline-item active"><i class="fa-solid fa-user-check"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-truck"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-check"></i></li>
    </ul>
    <div class="status-bar mt-3">
        <div class="progress">
            <div class="progress-bar" style="width: 32%;"></div>
        </div>
        <div class="status-indicators">
            <div class="status-circle circle-1 active"><i class="fa-solid fa-check"></i></div>
            <div class="status-circle circle-2 active"><i class="fa-solid fa-check"></i></div>
            <div class="status-circle circle-3"></div>
            <div class="status-circle circle-4"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
