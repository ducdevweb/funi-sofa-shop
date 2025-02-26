@extends('admin.layout_admin')

@section('tieude')
Chỉnh Sửa Bài Viết
@endsection

@section('noidungchinh')
<form method="post" action="{{ route('baiviet_nv.update', $baiViet->id_bv) }}" enctype="multipart/form-data" class="col-md-10">
    @csrf  
    @method('PUT') 
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Chỉnh Sửa Bài Viết</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Tiêu Đề Bài Viết</label>
                            <input type="text" class="form-control" id="postTitle" name="tieu_de" value="{{ $baiViet->tieu_de }}" placeholder="Nhập tiêu đề bài viết" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Tác Giả</label>
                            <input type="text" class="form-control" id="author" name="tac_gia" value="{{ $baiViet->tac_gia }}" placeholder="Nhập tên tác giả" required>
                        </div>

                        <div class="mb-3">
                            <label for="postContent" class="form-label">Nội Dung Bài Viết</label>
                            <textarea class="form-control" id="postContent" name="noi_dung" rows="5" placeholder="Nhập nội dung bài viết" required>{{ $baiViet->noi_dung }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="postImage" class="form-label">Hình Ảnh Bài Viết</label>
                            <input type="file" class="form-control" id="postImage" name="hinh" accept="image/*">
                            @if($baiViet->hinh_bv)
                                <div class="mt-2">
                                    <img src="{{ asset($baiViet->hinh_bv) }}" alt="Hình ảnh bài viết" class="img-fluid" style="max-height: 200px;">
                                </div>
                                <input type="hidden" name="hinh_cu" value="{{ $baiViet->hinh_bv }}">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
                        <a href="{{ route('baiviet_nv.index') }}">
                            <button type="button" class="btn btn-secondary">Hủy</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
