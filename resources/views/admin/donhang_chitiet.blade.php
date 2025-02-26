@extends('admin.layout_admin')

@section('tieude')
Chi tiết đơn hàng
@endsection

@section('noidungchinh')

  
     <!-- Content Area -->
     <div class="col-md-10 p-4">
         <div class="container mt-5">
            
  <!-- Thông tin khách hàng -->
<form class="card mt-3 shadow-lg border-light">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Thông Tin Khách Hàng</h5>
        <img src="assets/images/ban3.jpg" alt="Avatar" class="img-comment rounded-circle" style="width: 40px; height: 40px;" />
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-4">
                <p class="font-weight-bold text-dark">Tên Khách Hàng:</p>
            </div>
            <div class="col-sm-8">
                <p class="text-success">{{ $details->first()->donhangs->nguoiNhan }}</p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">
                <p class="font-weight-bold text-dark">SĐT:</p>
            </div>
            <div class="col-sm-8">
                <p class="text-success">{{ $details->first()->donhangs->soDienThoai }}</p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">
                <p class="font-weight-bold text-dark">Email:</p>
            </div>
            <div class="col-sm-8">
                <p class="text-success">{{ $details->first()->donhangs->email }}</p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">
                <p class="font-weight-bold text-dark">Địa Chỉ:</p>
            </div>
            <div class="col-sm-8">
                <p class="text-success">{{ $details->first()->donhangs->diaChi }}</p>
            </div>
        </div>
    </div>
</form>
@if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
<form class="card mt-3">
    <div class="card-header">
        <h5 class="mb-0">Thông Tin Đơn Hàng</h5>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Hình Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng Giá</th>
                    <th>Trạng Thái Thanh Toán</th>
                    <th>Ngày Đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id_dh }}</td>
                    <td><img src="{{ $item->hinh }}" alt="Product Image" class="small-product-img"></td>
                    <td>{{ $item->ten_sp }}</td>
                    <td>{{ $item->soLuong }}</td>
                    <td>{{ number_format($item->gia_sp, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item->thanh_tien, 0, ',', '.') }} VNĐ</td>
                    <td>
                        @if($item->thanhToan == 1)
                            <span class="badge bg-success">Đã thanh toán</span>
                        @else
                            <span class="badge bg-warning">Chưa thanh toán</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->ngayNhan)->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-end"><strong>Tổng Giá:</strong></td>
                    <td colspan="2" class="text-end"><strong>{{ number_format($details->sum('thanh_tien'), 0, ',', '.') }} VNĐ</strong></td>
                </tr>
                <!-- Giảm Giá (Voucher) có thể thêm nếu có -->
                <tr>
                    <td colspan="6" class="text-end"><strong>Giảm Giá (Voucher):</strong></td>
                    <td colspan="2" class="text-end text-danger"><strong>-0 VNĐ</strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-end"><strong>Tổng Giá Sau Giảm:</strong></td>
                    <td colspan="2" class="text-end"><strong>{{ number_format($details->sum('thanh_tien'), 0, ',', '.') }} VNĐ</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</form>


<!-- Trạng thái đơn hàng -->
<div class="card mt-3">
    <div class="card-header">
        <h5 class="mb-0">Trạng Thái Đơn Hàng</h5>
    </div>
    <div class="card-body">
        <p><strong>Trạng Thái:</strong> <span class="badge bg-warning">{{$details->first()->trangThai==0?'Chờ Xác Nhận':'Đang Xử Lý'}}</span></p>
</div>

<div class="text-end mt-3">
    <a href="{{ url()->previous() }}">
        <button class="btn btn-primary">Quay Lại</button>
    </a>

    <form action="{{ route('doanhthu.update', $details->first()->donhangs->id_dh) }}" method="POST" style="display: inline;">
        @csrf
        @method('PUT')
        @if($details->first()->donhangs) 
            <button type="submit" class="btn btn-success">
                Xác Nhận
            </button>
        @else
            <button class="btn btn-success" disabled>Xác Nhận</button>
        @endif
    </form>
</div>



@endsection
