@extends('shipper.layout_ship')
@section('noidungchinh')

<div class="container mt-4">
    <h1>Đơn hàng đang giao</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

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
                    <th>Thao tác</th>
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
                        <form action="guianh" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_dh" value="{{ $donHang->id_dh }}">
                            <div class="mb-3">
                                <label for="image_{{ $donHang->id_dh }}" class="form-label">Tải lên hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="image_{{ $donHang->id_dh }}" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi hình ảnh</button>
                        </form>
                    </td>
                    <td>
                        <span class="badge {{ $donHang->trangThai == 1 ? 'bg-warning' : 'bg-success' }}">
                            {{ $donHang->trangThai == 1 ? 'Chờ nhận' : 'Đang giao' }}
                        </span>
                    </td>
                    <td>
                        <form action="capNhatTrangThai" method="POST">
                            @csrf
                            <input type="hidden" name="id_dh" value="{{ $donHang->id_dh }}">
                            <input type="hidden" name="trangThai" value="2"> <!-- Trạng thái cập nhật -->
                            <button type="submit" class="btn btn-primary">Tiến hành giao</button>
                        </form>
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
