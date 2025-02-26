@extends('admin.layout_admin')
@section('tieude')
Chi tiết sản phẩm
@endsection
@section('noidungchinh')

<div class="col-md-10">
@if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset($sanpham->hinh) }}" class="img-fluid rounded" alt="{{ $sanpham->ten_sp }}">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-primary">{{ $sanpham->ten_sp }}</h5>
                                    
                                    <p class="card-text"><strong>Giá:</strong> <span class="text-danger font-weight-bold">{{ number_format($sanpham->gia_sp, 0, ',', '.') }} VNĐ</span></p>
                                    <p class="card-text"><strong>Giá Sale:</strong> <span class="text-danger font-weight-bold">{{ $sanpham->giaSale ? number_format($sanpham->giaSale, 0, ',', '.') . ' VNĐ' : 'Không có' }}</span></p>
                                    <p class="card-text"><strong>Danh Mục:</strong> <span class="font-weight-normal">{{ $sanpham->id_loaisp }}</span></p>
                                    <p class="card-text"><strong>Loại Gỗ:</strong> <span class="font-weight-normal">{{ $sanpham->loai_go }}</span></p>
                                    <p class="card-text"><strong>Kích Thước:</strong> <span class="font-weight-normal">{{ $sanpham->kich_thuoc }}</span></p>
                                    <p class="card-text"><strong>Màu Sắc:</strong> <span class="font-weight-normal">{{ $sanpham->mau_sac }}</span></p>
                                    <p class="card-text"><strong>Số Lượng Tồn:</strong> <span class="font-weight-normal">{{ $sanpham->soLuong }}</span></p>
                                    <p class="card-text"><strong>Nơi Xuất Xứ:</strong> <span class="font-weight-normal">Việt Nam</span></p>
                                    <p class="card-text"><strong>Nhà Cung Cấp:</strong> <span class="font-weight-normal">{{ $sanpham->id_nsx }}</span></p>
                                    <p class="card-text"><strong>Bảo Hành:</strong> <span class="font-weight-normal">{{ $sanpham->bao_hanh }} tháng</span></p>
                                    <p class="card-text"><strong>Đánh Giá:</strong> <span class="font-weight-normal">{{ $sanpham->danhgia ?? 'Chưa có đánh giá' }}</span></p>
                                    <p class="card-text"><strong>Lượt Xem:</strong> <span class="font-weight-normal">{{ $sanpham->luotXem ?? 0 }}</span></p>
                                    <p class="card-text"><strong>Lượt Mua:</strong> <span class="font-weight-normal">{{ $sanpham->luot_mua ?? 0 }}</span></p>
                                    <p class="card-text"><strong>Trạng Thái:</strong> <span class="text-success font-weight-bold">{{ $sanpham->anHien ? 'Còn hàng' : 'Hết hàng' }}</span></p>
                                    <p class="card-text"><strong>Ngày Đăng:</strong> <span class="font-weight-normal">{{ $sanpham->ngayDang }}</span></p>
                                    <p class="card-text"><strong>Thông Tin Kích Thước:</strong> {!! $sanpham->thong_tin !!}</p>

                                    <p class="card-text"><strong>Mô Tả:</strong> {!! $sanpham->moTa !!}</p>
                                    <a href="{{ route('sanpham.index') }}" class="btn btn-danger mt-2" style="border-radius: 5px;">Quay lại</a>
                                    <a href="{{ route('sanpham.edit', $sanpham->id_sp) }}">
                                        <button type="button" class="btn btn-primary mt-2">Chỉnh sửa</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
