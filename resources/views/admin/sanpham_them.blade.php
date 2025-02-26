@extends('admin.layout_admin')

@section('tieude')
Thêm sản phẩm
@endsection

@section('noidungchinh')
<form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data" class="col-md-10 mx-auto p-4 bg-light shadow-sm rounded">
    @csrf 
    <h3 class="text-center mb-4 text-primary">Thêm Sản Phẩm Mới</h3>
    <div class="row">
        <div class="col-md-6">

            <div class="mb-3">
                <label for="editProductName" class="form-label fw-bold">Tên sản phẩm</label>
                <input type="text" class="form-control border-primary" id="editProductName" name="ten" required>
            </div>

            <div class="mb-3">
                <label for="editProductPrice" class="form-label fw-bold">Giá</label>
                <input type="text" class="form-control border-primary" id="editProductPrice" name="gia" required>
            </div>

            <div class="mb-3">
                <label for="editProductWoodType" class="form-label fw-bold">Loại gỗ</label>
                <input type="text" class="form-control border-primary" id="editProductWoodType" name="loai_go" required>
            </div>

            <div class="mb-3">
                <label for="editProductColor" class="form-label fw-bold">Màu sắc</label>
                <input type="text" class="form-control border-primary" id="editProductColor" name="mau_sac" required>
            </div>

            <div class="mb-3">
                <label for="editManufacturer" class="form-label fw-bold">Chọn nhà sản xuất</label>
                <select class="form-select border-primary" id="editManufacturer" name="nsx" required>
                    @foreach ($nsx as $n)
                        <option value="{{ $n->id_nsx }}">{{ $n->ten_nsx }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="editCategory" class="form-label fw-bold">Chọn danh mục</label>
                <select class="form-select border-primary" id="editCategory" name="loai_sp" required>
                    @foreach ($loai_sp as $sp)
                        <option value="{{ $sp->id_loaisp }}">{{ $sp->loai }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="editProductStatus" class="form-label fw-bold">Trạng thái sản phẩm</label>
                <select class="form-select border-primary" id="editProductStatus" name="anHien" required>
                    <option value="1">Hiện sản phẩm</option>
                    <option value="0">Ẩn sản phẩm</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="editProductDate" class="form-label fw-bold">Ngày đăng</label>
                <input type="date" class="form-control border-primary" id="editProductDate" name="ngayDang" required>
            </div>
            <div class="mb-3">
                <label for="editProductDescription" class="form-label fw-bold">Mô tả</label>
                <textarea class="form-control border-primary" id="editProductDescription" rows="3" name="moTa" required></textarea>
            </div>

        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="editProductStock" class="form-label fw-bold">Số lượng trong kho</label>
                <input type="number" class="form-control border-primary" id="editProductStock" name="soLuong" required>
            </div>

            <div class="mb-3">
                <label for="editProductDiscount" class="form-label fw-bold">Giá khuyến mãi</label>
                <input type="text" class="form-control border-primary" id="editProductDiscount" name="gia_km">
            </div>

            <div class="mb-3">
                <label for="editProductSize" class="form-label fw-bold">Kích thước</label>
                <input type="text" class="form-control border-primary" id="editProductSize" name="kich_thuoc">
            </div>

            <div class="mb-3">
                <label for="editProductWarranty" class="form-label fw-bold">Bảo hành</label>
                <input type="text" class="form-control border-primary" id="editProductWarranty" name="bao_hanh">
            </div>

            <div class="mb-3">
                <label for="editProductImage" class="form-label fw-bold">Hình ảnh chính</label>
                <input type="file" class="form-control border-primary" id="editProductImage" name="hinh">
            </div>

            <div class="mb-3">
                <label for="editProductImage1" class="form-label fw-bold">Hình ảnh phụ 1</label>
                <input type="file" class="form-control border-primary" id="editProductImage1" name="hinh_1">
            </div>

            <div class="mb-3">
                <label for="editProductImage2" class="form-label fw-bold">Hình ảnh phụ 2</label>
                <input type="file" class="form-control border-primary" id="editProductImage2" name="hinh_2">
            </div>

            <div class="mb-3">
                <label for="editFeaturedProduct" class="form-label fw-bold">Sản phẩm nổi bật</label>
                <select class="form-select border-primary" id="editFeaturedProduct" name="hot" required>
                    <option value="1">Sản phẩm hot</option>
                    <option value="0">Sản phẩm bình thường</option>
                </select>
            </div>

      
            <div class="mb-3">
                <label for="editProductInfo" class="form-label fw-bold">Thông tin khác</label>
                <textarea class="form-control border-primary" id="editProductInfo" rows="3" name="thong_tin"></textarea>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success px-5 me-2">Thêm sản phẩm</button>
        <button type="button" class="btn btn-secondary px-5">Hủy</button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('moTa'); 
    CKEDITOR.replace('thong_tin');
</script>
@endsection
