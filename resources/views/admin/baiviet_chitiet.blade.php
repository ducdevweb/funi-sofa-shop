@extends('admin.layout_admin')

@section('tieude')
Chi Tiết Bài Viết
@endsection

@section('noidungchinh')
<div class="col-md-10 p-4">
    <div class="container mt-4">
        <div class="card shadow" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h4 class="font-weight-bold mb-0">{{ $baiViet->tieu_de }}</h4>
            </div>
            <div class="card-body d-flex">
                <div class="me-4" style="flex: 1;">
                    @if($baiViet->hinh_bv)
                        <img src="{{ asset($baiViet->hinh_bv) }}" alt="Hình ảnh bài viết" class="img-fluid mb-3">
                    @endif
                </div>
                <div style="flex: 2;">
                    <div class="mb-3">
                        <strong>Tác Giả:</strong> {{ $baiViet->tac_gia }}
                    </div>
                    <div class="mb-3">
                        <strong>Ngày Đăng:</strong> {{ \Carbon\Carbon::parse($baiViet->ngay_dang)->format('d/m/Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Nội Dung:</strong>
                        <div>{!! $baiViet->noi_dung !!}</div>
                    </div>
                    <a href="{{ route('baiviet.index') }}" class="btn btn-secondary">Quay lại</a>
                    <a href="{{ route('baiviet.edit',$baiViet->id_bv) }}" class="btn btn-secondary">Chỉnh sửa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
