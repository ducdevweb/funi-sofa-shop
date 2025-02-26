@extends('nhanvien.layout_nhanvien')


@section('tieude')
    Thêm danh mục
@endsection

@section('noidungchinh')

<div class="col-md-10">
    <div class="container mt-4">
        <div class="card shadow" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h4 class="font-weight-bold mb-0">Thêm danh mục</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('danhmuc_nv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="thu_tu" class="form-label">Thứ tự</label>
                        <input type="text" class="form-control" name="thu_tu" placeholder="Nhập thứ tự" required>
                    </div>
                    <div class="mb-3">
                        <label for="loai" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="loai" placeholder="Nhập loại danh mục" required>
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" name="hinh" id="editProductImage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Đóng</button>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
    