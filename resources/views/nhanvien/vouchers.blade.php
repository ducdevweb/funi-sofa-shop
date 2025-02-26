@extends('nhanvien.layout_nhanvien')

@section('tieude')
Quản lý giảm giá
@endsection

@section('noidungchinh')
<div class="col-md-10 p-4">
          <!-- Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('vouchers_nv.index') }}" method="GET">
            @csrf
            <input type="hidden" name="filter" value="available">
            <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Voucher Có Thể Dùng</h5>
                        <p class="card-text">{{$voucher_existing}} Voucher </p>
                    </div>
                    <i class="bi bi-bag-check fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem Voucher</button>
            </div>
        </form>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('vouchers_nv.index') }}" method="GET">
            @csrf
            <input type="hidden" name="filter" value="expired">
            <div class="card text-white bg-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Voucher Hết Hạn Dùng</h5>
                        <p class="card-text">{{$voucher_expired}} Voucher Hết Hạn</p>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem Voucher</button>
            </div>
        </form>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('vouchers_nv.index') }}" method="GET">
            @csrf
            <input type="hidden" name="filter" value="used">
            <div class="card text-white bg-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Voucher Hết Lượt dùng</h5>
                        <p class="card-text">{{$voucher_used}} Voucher</p>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem Voucher</button>
            </div>
        </form>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('vouchers_nv.index') }}" method="GET">
            @csrf
            <input type="hidden" name="filter" value="hidden">
            <div class="card text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Voucher Vô Hiệu Hóa </h5>
                        <p class="card-text">{{$voucher_hidden}} Voucher</p>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem Voucher Sự Kiện</button>
            </div>
        </form>
    </div>
</div>
<form action="{{ route('vouchers_nv.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="hidden" name="filter" value="search"> 
        <input type="text" name="search" class="form-control" placeholder="Nhập mã giảm giá">
        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
    </div>
</form>

    <!-- Main content -->
    <div class="container mt-4">
      <div class="card-header d-flex justify-content-between align-items-center">
      <h2>Danh Sách Voucher</h2>
      <a href="{{route('vouchers_nv.create')}}"><button class="btn btn-light" data-bs-toggle="modal">Thêm Voucher Mới</button></a>
    </div>
    <div class="comment-container" id="commentContainer">
      <div class="comment">
           <div class="row mb-4">
            <!-- Bảng Voucher -->
              <div class="card-body">
                <table class="table table-hover table-responsive">
                  <thead class="table-primary">
                    <tr>
                      <th>#</th>
                      <th>Mã Voucher</th>
                      <th>Giới Hạn Dùng</th>
                      <th>Số Lần Đã Dùng</th>
                      <th>Giá Trị Giảm Giá</th>
                      <th>Ngày Bắt Đầu</th>
                      <th>Ngày Hết Hạn</th>
                      <th>Trạng Thái</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($voucher_arr)>0)
                    @foreach($voucher_arr as $voucher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $voucher->ma_giam_gia }}</td>
                            <td>{{ $voucher->gioi_han_su_dung }}</td>
                            <td>{{ $voucher->da_su_dung }}</td>
                            <td>{{ $voucher->so_tien_giam }}</td>
                            <td>{{ $voucher->ngay_bat_dau }}</td>
                            <td>{{ $voucher->ngay_het_han }}</td>
                            <td>{{$voucher->an_hien==1?'Đã Kích Hoạt':'Vô Hiệu Hóa'}}</td>
                            <td>
                                <a href="{{ route('vouchers_nv.edit', $voucher->id_mgg) }}">
                                    <button class="btn btn-sm btn-primary">Chỉnh Sửa</button>
                                </a>

                                <form action="{{ route('vouchers_nv.destroy', $voucher->id_mgg) }}" method="POST" style="display:inline;">
                                
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa voucher này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        @else
                        <tr>
                         <td colspan="11" class="text-center">Không có mã giảm giá này</td> 
                        </tr>
                        @endif
                </tbody>

                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection