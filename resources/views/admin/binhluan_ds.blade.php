@extends('admin.layout_admin')
@section('title') Danh sách bình luận@endsection
@section('noidungchinh')
    <div class="container my-5">
        <h2 class="mb-4">Quản lý Bình luận</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình sản phẩm</th>
                    <th>Bình luận</th>
                    <th>Đánh giá</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanpham_arr as $sanpham)
                    <tr>
                        <td>{{ $sanpham->id_sp }}</td>
                        <td>{{ $sanpham->ten_sp }}</td>
                        <td><img src="{{$sanpham->hinh}}" alt="" width="100" height="100"></td>
                        <td>{{ $sanpham->danhgia }}</td>
                        <td>{{ $sanpham->binhluan }}</td>
                        <td>{{ $sanpham->ngayDang }}</td>
                        <td>
                        <a href="/admin/chitiet_bl/{{$sanpham->id_sp}}" class="btn btn-info btn-sm">Xem bình luận</a>
                        <a href="/admin/danhgia_ct/{{$sanpham->id_sp}}" class="btn btn-info btn-sm">Xem đánh giá</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $sanpham_arr->links() }}
        </div>
    </div>
@endsection
