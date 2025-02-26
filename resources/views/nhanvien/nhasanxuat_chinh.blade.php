@extends('nhanvien.layout_nhanvien')

@section('tieude')
   Sửa nhà sản xuất
@endsection

@section('noidungchinh')

<div class="col-md-10">
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Sửa nhà sản xuất</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nhasanxuat_nv.update', $sua->id_nsx) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="number" class="form-control" name="thu_tu" value="{{ $sua->thuTu }}" placeholder="Nhập thứ tự" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="ten_nsx" value="{{ $sua->ten_nsx }}" placeholder="Nhập tên nhà sản xuất" required>
                            </div>
                            <div class="mb-3">
                                <label for="manufacturerSelect" class="form-label">Chọn nhà sản xuất nội thất gỗ</label>
                                <select class="form-select" id="manufacturerSelect" name="an_hien" required>
                                    <option value="1" {{ $sua->anHien == 1 ? 'selected' : '' }}>Hiện</option>
                                    <option value="0" {{ $sua->anHien == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('nhasanxuat_nv.index') }}"><button type="button" class="btn btn-secondary">Đóng</button></a>
                                <button type="submit" class="btn btn-success">Cập Nhật</button>
                            </div>          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
