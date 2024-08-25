@extends('admin.layout_admin')

@section('tieude', 'Danh Sách Đơn Hàng')

@section('noidungchinh')
<!-- Lightbox CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Danh Sách Đơn Hàng Đã Thanh Toán</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên khach hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ 
                            <br>nhận hàng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ngày đặt đơn hàng</th>
                        <th>Xác nhận 
                        <br>    
                        thanh toán</th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhangdathanhtoan as $order)
                    <tr>
                        <td>{{ $order->maDon }}</td>
                        <td>{{ $order->nguoiNhan }}</td>
                        <td>{{ $order->soDienThoai }}</td>
                        <td>{{ $order->diaChi }}</td>
                        <td>
                        @if ($order->trangThai==0)
                            Chưa nhận Hàng
                        @else
                        Đã nhận hàng
                        @endif
                        </td>
                        <td>
                            @if ($order->thanhToan==0)
                                Chưa thanh toán
                            @else
                            Đã thanh toán
                            @endif
                        </td>
                        <td>
                        @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $order->hinhThanhToan))
                            <a href="{{ $order->hinhThanhToan }}" data-fancybox="gallery" data-caption="Hình ảnh">
                                <img src="{{ $order->hinhThanhToan }}" alt="Hình ảnh" width="100" height="100">
                            </a>
                        @else
                            {{ $order->hinhThanhToan }}
                        @endif
                        </td>
                        <td>{{ $order->ngayMua }}</td>
                        <td>
                            @if ($order->thanhToan===0)
                                <a href="admin/thanhtoan/{{$order->id_dh}}">Xác nhận thanh toán</a>
                            @else
                            <a href="/admin/thanhtoan/{{$order->id_dh}}">Hủy thanh toán vì sai hình thanh toán</a>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Danh Sách Đơn Hàng Chưa Thanh Toán</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>ID Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ngày Đặt Hàng</th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhangchuathanhtoan as $orders)
                    <tr>
                        <td>{{ $orders->maDon }}</td>
                        <td>{{ $orders->nguoiNhan }}</td>
                        <td>{{ $orders->soDienThoai }}</td>
                        <td>{{ $orders->diaChi }}</td>
                        <td>
                        @if ($orders->trangThai==0)
                            Chưa nhận Hàng
                        @else
                        Đã nhận hàng
                        @endif
                        </td>
                        <td>
                            @if ($orders->thanhToan==0)
                                Chưa thanh toán
                            @else
                            Đã thanh toán
                            @endif
                        </td>
                        <td>
                        @if (filter_var($orders->hinhThanhToan, FILTER_VALIDATE_URL) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $orders->hinhThanhToan))
                                <img src="{{ $orders->hinhThanhToan }}" alt="Hình ảnh" width="100" height="100">
                            @else
                                {{ $orders->hinhThanhToan }}
                                
                            @endif
                        </td>
                        <td>{{ $orders->ngayMua }}</td>
                
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
