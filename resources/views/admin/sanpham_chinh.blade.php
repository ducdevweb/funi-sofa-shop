@extends('admin.layout_admin')

@section('tieude')
Quản lý sản phẩm
@endsection

@section('noidungchinh')

<div class="col-md-10">
    <form id="frm" method="POST" enctype="multipart/form-data" action="{{ route('sanpham.update', $sp->id_sp) }}" class="mx-auto p-4 shadow bg-white rounded" style="max-width: 1200px;">
        @csrf
        @method('PUT')

        <h4 class="text-center bg-warning p-3 mb-4 text-uppercase rounded">Chỉnh sửa sản phẩm</h4>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="ten_sp" class="form-label">Tên sản phẩm</label>
                <input name="ten_sp" type="text" value="{{ $sp->ten_sp }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="ngayDang" class="form-label">Ngày đăng</label>
                <input name="ngayDang" type="date" value="{{ $sp->ngayDang }}" class="form-control">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="gia_sp" class="form-label">Giá sản phẩm</label>
                <input name="gia_sp" type="number" value="{{ $sp->gia_sp }}" class="form-control" min="1">
            </div>
            <div class="col-md-6">
                <label for="giaSale" class="form-label">Giá khuyến mãi</label>
                <input name="giaSale" type="number" value="{{ $sp->giaSale }}" class="form-control">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="id_loaisp" class="form-label">Loại sản phẩm</label>
                <select name="id_loaisp" class="form-select">
                    @foreach($loai_arr as $loai)
                        <option value="{{ $loai->id_loaisp }}" {{ $loai->id_loaisp == $sp->id_loaisp ? "selected" : "" }}>
                            {{ $loai->loai }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="nsx" class="form-label">Nhà sản xuất</label>
                <select name="nsx" class="form-select">
                    <option value="0" disabled>- Chọn nhà sản xuất -</option>
                    @foreach($nsx_arr as $nsx)
                        <option value="{{ $nsx->id_nsx }}" {{ $nsx->id_nsx == $sp->id_nsx ? "selected" : "" }}>
                            {{ $nsx->ten_nsx }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Hình ảnh sản phẩm -->
        <div class="row mb-4">
            <div class="row g-3">
            <div class="col-md-4 col-12">
                <label for="hinh" class="form-label">Hình sản chính</label>
                <input type="hidden" name="hinhcu" value="{{ $sp->hinh }}">
                <img src="{{ asset($sp->hinh) }}" class="img-thumbnail mb-2 h-75" alt="Hình hiện tại">
                <input name="hinh" type="file" class="form-control">
            </div>
            <div class="col-md-4 col-12">
                <label for="hinh" class="form-label">Hình sản phẩm phụ 1</label>
                <input type="hidden" name="hinhcu_1" value="{{ $sp->hinh_1 }}">
                <img src="{{ asset($sp->hinh_1) }}" class="img-thumbnail mb-2 h-75" alt="Hình hiện tại">
                <input name="hinh_1" type="file" class="form-control">
            </div>
            <div class="col-md-4 col-12">
                <label for="hinh" class="form-label">Hình sản phẩm phụ 2</label>
                <input type="hidden" name="hinhcu_2" value="{{ $sp->hinh_2 }}">
                <img src="{{ asset($sp->hinh_2) }}" class="img-thumbnail mb-2 h-75" alt="Hình hiện tại">
                <input name="hinh_2" type="file" class="form-control">
            </div>
            </div>
            <div class="col-md-4">
                <label for="anHien" class="form-label">Hiển thị</label>
                <select name="anHien" class="form-select">
                    <option value="0" {{ $sp->anHien == 0 ? "selected" : "" }}>Ẩn</option>
                    <option value="1" {{ $sp->anHien == 1 ? "selected" : "" }}>Hiện</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="hot" class="form-label">Trạng thái</label>
                <select name="hot" class="form-select">
                    <option value="0" {{ $sp->hot == 0 ? "selected" : "" }}>Bình thường</option>
                    <option value="1" {{ $sp->hot == 1 ? "selected" : "" }}>Nổi bật</option>
                </select>
            </div>
        </div>

        <!-- Các trường thông tin khác -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="soLuong" class="form-label">Số lượng</label>
                <input name="soLuong" type="number" value="{{ $sp->soLuong }}" class="form-control" min="1">
            </div>
            <div class="col-md-4">
                <label for="luot_mua" class="form-label">Lượt mua</label>
                <input name="luot_mua" type="number" value="{{ $sp->luot_mua }}" class="form-control" min="0">
            </div>
            <div class="col-md-4">
                <label for="luotXem" class="form-label">Lượt xem</label>
                <input name="luotXem" type="number" value="{{ $sp->luotXem }}" class="form-control" min="0">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="loai_go" class="form-label">Loại gỗ</label>
                <input name="loai_go" type="text" value="{{ $sp->loai_go }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="kich_thuoc" class="form-label">Kích thước</label>
                <input name="kich_thuoc" type="text" value="{{ $sp->kich_thuoc }}" class="form-control">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="mau_sac" class="form-label">Màu sắc</label>
                <input name="mau_sac" type="text" value="{{ $sp->mau_sac }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="bao_hanh" class="form-label">Bảo hành</label>
                <input name="bao_hanh" type="text" value="{{ $sp->bao_hanh }}" class="form-control">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <label for="thong_tin" class="form-label">Thông tin chi tiết</label>
                <textarea name="thong_tin" rows="4" class="form-control">{{ $sp->thong_tin }}</textarea>
            </div>
        </div>

        <div class="mb-4">
            <label for="moTa" class="form-label">Mô tả sản phẩm</label>
            <textarea name="moTa" rows="4" class="form-control">{{ $sp->moTa }}</textarea>
        </div>

        <!-- Nút lưu và hủy -->
        <div class="text-center">
            <button type="submit" class="btn btn-success px-5 py-2">Lưu thông tin</button>
            <a href="{{ route('sanpham.index') }}" class="btn btn-secondary px-5 py-2">Hủy</a>
        </div>
    </form>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('moTa');
    CKEDITOR.replace('thong_tin');
</script>
@endsection