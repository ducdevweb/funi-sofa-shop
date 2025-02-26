@extends('nhanvien.layout_nhanvien')


@section('tieude')
Thêm bài viết
@endsection

@section('noidungchinh')
<form method="post" action="{{ route('baiviet_nv.store') }}" enctype="multipart/form-data" class="col-md-10">
    @csrf  
    <div class="comment">
        <div class="row mb-4">
            <div class="container mt-4">
                <div class="card shadow" style="border-radius: 10px;">
                    <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="font-weight-bold mb-0">Thêm bài viết</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Tiêu Đề Bài Viết</label>
                            <input type="text" class="form-control" id="postTitle" name="tieu_de" placeholder="Nhập tiêu đề bài viết" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Tác Giả</label>
                            <input type="text" class="form-control" id="author" name="tac_gia" placeholder="Nhập tên tác giả" required>
                        </div>

                        <div class="mb-3">
                            <label for="postContent" class="form-label">Nội Dung Bài Viết</label>
                            <textarea class="form-control" id="postContent" name="noi_dung" rows="5" placeholder="Nhập nội dung bài viết" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="postImage" class="form-label">Hình Ảnh Bài Viết</label>
                            <input type="file" class="form-control" id="postImage" name="hinh" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
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
