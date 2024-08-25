

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
                    <th>Nội dung Bình luận</th>
                    <th>Ngày Đăng</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($binhluan as $bl)
                    <tr>
                        <td>{{ $bl->id_sp }}</td>
                        <td>{{ $bl->id_nd }}</td>
                        <td>{{ $bl->ten_nd }}</td>
                        <td>{{ $bl->noiDung }}</td>
                        <td>{{ $bl->ngayDang }}</td>
                        <td><form action="{{ route('binhluan.destroy', $bl->id_bl) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                        </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>

 
        <a href="{{route('binhluan.index')}}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
