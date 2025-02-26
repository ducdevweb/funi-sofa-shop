@extends('admin.layout_admin')

@section('tieude')
    Chỉnh sửa danh mục
@endsection

@section('noidungchinh')

<div class="col-md-10">
  <div class="container mt-4">
    <div class="card shadow" style="border-radius: 10px;">
      <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h4 class="font-weight-bold mb-0">Chỉnh sửa danh mục</h4>
      </div>
      <div class="card-body">
   
<form action="{{ route('danhmuc.update', $danhmuc->id_loaisp) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="thu_tu" class="form-label">Thứ tự</label>
        <input type="text" class="form-control" name="thu_tu" value="{{ $danhmuc->thu_tu }}" placeholder="Nhập thứ tự">
    </div>
    <div class="mb-3">
        <label for="loai" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="loai" value="{{ $danhmuc->loai }}" placeholder="Nhập loại danh mục">
    </div>
    <div class="mb-3">
            <label for="hinh" class="form-label fw-bold">Hình</label>
            <input type="hidden" name="hinhcu" value="{{ $danhmuc->hinh }}">
            <input name="hinh" type="file" class="form-control border-primary">
    </div>

    <!-- Nút Lưu và Hủy -->
    <button type="submit" class="btn btn-sm btn-orange">Lưu</button>
    <a href="{{ route('danhmuc.index') }}" class="btn btn-secondary">Hủy</a>
</form>

      </div>
    </div>
  </div>
</div>
@endsection
