@extends('admin.layout_admin')

@section('tieude')
    Quản lý danh mục
@endsection

@section('noidungchinh')

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Danh mục sản phẩm</h5>
  
            <a href="{{ route('danhmuc.create') }}">
                <button class="btn btn-primary">Thêm danh mục mới</button>
            </a>
        </div>
        @if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6>Tổng số danh mục hiện có: <span id="totalCategories">{{ count($danhmuc_arr) }}</span></h6> 
                <form class="col-lg-4 col-md-6 d-flex" action="{{ route('danhmuc.index') }}" method="GET">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm" value="{{ request('search') }}">
                    <button class="btn btn-primary ms-2" type="submit">Tìm</button>
                </form>
            </div>
            <div class="comment-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhmuc_arr as $danhmuc)
                        <tr>
                            <td>{{ $danhmuc->id_loaisp }}</td>
                            <td >
                                <img src="{{ $danhmuc->hinh }}" alt="Product Image" class="small-product-img" style="width: 150px;height: 150px;">
                            </td>
                            <td>{{ $danhmuc->loai }}</td>
                            <td>
                                <a href="{{ route('danhmuc.edit', $danhmuc->id_loaisp) }}">
                                    <button class="btn btn-warning btn-sm">Chỉnh sửa</button>
                                </a>
                                <form action="{{ route('danhmuc.destroy', $danhmuc->id_loaisp) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
