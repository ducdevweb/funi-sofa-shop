@extends('nhanvien.layout_nhanvien')


@section('tieude')
Sửa sản phẩm
@endsection

@section('noidungchinh')

<form id="frm" method="POST" enctype="multipart/form-data" action="{{ route('sanpham_nv.update', $sp->id_sp) }}" class="mx-auto p-4 shadow bg-white rounded" style="max-width: 1200px;">
    @csrf
    @method('PUT')

    <h4 class="text-center bg-warning p-3 mb-4 text-uppercase rounded">Chỉnh sửa sản phẩm</h4>

    <div class="row mb-4">
        <div class="col-md-6">
            <label for="ten_sp" class="form-label fw-bold">Tên sản phẩm</label>
            <input name="ten_sp" type="text" value="{{ $sp->ten_sp }}" class="form-control border-primary">
        </div>
        <div class="col-md-6">
            <label for="ngayDang" class="form-label fw-bold">Ngày đăng</label>
            <input name="ngayDang" type="date" value="{{ $sp->ngayDang }}" class="form-control border-primary">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label for="gia_sp" class="form-label fw-bold">Giá sản phẩm</label>
            <input name="gia_sp" type="number" value="{{ $sp->gia_sp }}" class="form-control border-primary" min="1">
        </div>
        <div class="col-md-6">
            <label for="giaSale" class="form-label fw-bold">Giá khuyến mãi</label>
            <input name="giaSale" type="number" value="{{ $sp->giaSale }}" class="form-control border-primary">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label for="id_loaisp" class="form-label fw-bold">Loại sản phẩm</label>
            <select name="id_loaisp" class="form-select border-primary">
                @foreach($loai_arr as $loai)
                    <option value="{{ $loai->id_loaisp }}" {{ $loai->id_loaisp == $sp->id_loaisp ? "selected" : "" }}>
                        {{ $loai->loai }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="nsx" class="form-label fw-bold">Nhà sản xuất</label>
            <select name="nsx" class="form-select border-primary">
                <option value="0" disabled>- Chọn nhà sản xuất -</option>
                @foreach($nsx_arr as $nsx)
                    <option value="{{ $nsx->id_nsx }}" {{ $nsx->id_nsx == $sp->id_nsx ? "selected" : "" }}>
                        {{ $nsx->ten_nsx }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <label for="hinh" class="form-label fw-bold">Hình sản phẩm</label>
            <input type="hidden" name="hinhcu" value="{{ $sp->hinh }}">
            <img src="{{ asset($sp->hinh) }}" width="300" height="100" class="img-thumbnail mb-2" alt="Hình hiện tại">
            <input name="hinh" type="file" class="form-control border-primary">
        </div>
        <div class="col-md-4">
            <label for="anHien" class="form-label fw-bold">Hiển thị</label>
            <select name="anHien" class="form-select border-primary">
                <option value="0" {{ $sp->anHien == 0 ? "selected" : "" }}>Ẩn</option>
                <option value="1" {{ $sp->anHien == 1 ? "selected" : "" }}>Hiện</option>
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="hot" class="form-label fw-bold">Trạng thái</label>
            <select name="hot" class="form-select border-primary">
                <option value="0" {{ $sp->hot == 0 ? "selected" : "" }}>Bình thường</option>
                <option value="1" {{ $sp->hot == 1 ? "selected" : "" }}>Nổi bật</option>
            </select>
        </div>
    </div>

    <div class="mb-4">
        <label for="moTa" class="form-label fw-bold">Mô tả sản phẩm</label>
        <textarea name="moTa" rows="4" class="form-control border-primary">{{ $sp->moTa }}</textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success px-5 py-2">Lưu thông tin</button>
        <a href="{{ route('sanpham_nv.index') }}" class="btn btn-secondary px-5 py-2">Hủy</a>
    </div>
</form>

@endsection
