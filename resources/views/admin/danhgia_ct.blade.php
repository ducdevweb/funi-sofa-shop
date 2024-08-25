

@extends('admin.layout_admin')

@section('tieude', 'Chi tiết Bình luận')

@section('noidungchinh')
    <div class="container my-5">
        <h2 class="mb-4">Chi tiết Bình luận - {{ $sanpham->ten_sp }}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Sản phẩm</th>
                    <th>ID Người dùng</th>
                    <th>Tên người dùng</th>
                    <th>Đánh giá người dùng</th>
                    <th>Ngày Đăng</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($danhgia as $dg)
                    <tr>
                        <td>{{ $dg->id_sp }}</td>
                        <td>{{ $dg->id_nd }}</td>
                        <td>{{ $dg->ten_nd }}</td>
                        <td>{{ $dg->danhGia }}&#9733;</td>
                        <td>{{ $dg->ngayDang }}</td>
                        <td><form action="/admin/danhgia{{ $dg->id_sp }}" method="POST" style="display:inline;">
                                @csrf
                                
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?')">Xóa</button>
                            </form></td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>

 
        <a href="{{route('binhluan.index')}}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
