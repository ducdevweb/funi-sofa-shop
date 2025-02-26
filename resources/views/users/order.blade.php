@extends('users.layout')

@section('tieude')
Trang đơn hàng
@endsection

@section('noidung')
<style>
    /* Thiết lập chiều rộng cố định cho các cột trong tbody */
    .table thead th, .table tbody td {
        white-space: nowrap;
    }

    .table tbody td {
        vertical-align: middle;
    }

    /* Cố định chiều rộng của các cột */
    .table td[data-label="Mã đơn hàng"] { width: 100px; }
    .table td[data-label="Tên khách hàng"] { width: 150px; }
    .table td[data-label="Số điện thoại"] { width: 120px; }
    .table td[data-label="Email"] { width: 180px; }
    .table td[data-label="Địa chỉ"] { width: 200px; }
    .table td[data-label="Ngày mua"] { width: 100px; }
    .table td[data-label="Trạng thái"] { width: 100px; }
    .table td[data-label="Hành động"] { width: 120px; }

    /* Canh giữa nội dung các ô */
    .table td, .table th {
        text-align: center;
    }

    /* Thay đổi kích thước nút */
    .detail-order-btn {
        padding: 5px 15px;
    }
</style>

<div class="container my-5">
    <div class="header-container mb-4 text-center">
        <h2 class="header-title">Đơn hàng của bạn</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày mua</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td data-label="Mã đơn hàng">{{ $order->maDon }}</td>
                        <td data-label="Tên khách hàng">{{ $order->tenNguoiNhan }}</td>
                        <td data-label="Số điện thoại">{{ $order->soDienThoai }}</td>
                        <td data-label="Email">{{ $order->email }}</td>
                        <td data-label="Địa chỉ">{{ $order->diaChi }}</td>
                        <td data-label="Ngày mua">{{ \Carbon\Carbon::parse($order->ngayMua)->format('d/m/Y') }}</td>
                        <td data-label="Trạng thái">
                            @switch($order->trangThai)
                                @case(0)
                                    <span class="badge bg-secondary">Đã xác nhận</span>
                                    @break
                                @case(1)
                                    <span class="badge bg-info">Đang nhận hàng</span>
                                    @break
                                @case(2)
                                    <span class="badge bg-warning">Đang giao hàng</span>
                                    @break
                                @case(3)
                                    <span class="badge bg-success">Đã giao</span>
                                    @break
                                @default
                                    <span class="badge bg-dark">Không xác định</span>
                            @endswitch
                        </td>

                        <td class="text-center" data-label="Hành động">
                            <a href="/godatviet/deltail_order/{{$order->id_dh}}" class="btn btn-primary mb-5 mt-5 detail-order-btn">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
