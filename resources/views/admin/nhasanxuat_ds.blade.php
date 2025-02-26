@extends('admin.layout_admin')

@section('tieude')
    Quản lý nhà sản xuất
@endsection

@section('noidungchinh')

<div class="col-md-10 p-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Nhà sản xuất</h5>
            <a class="btn btn-primary" href="{{route('nhasanxuat.create')}}">Thêm nhà sản xuất mới</a>
        
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6>Tổng số nhà sản xuất hiện có: <span id="totalManufacturers">{{ $nsx_arr->count() }}</span></h6>
                <form method="get" action="{{route('nhasanxuat.index')}}" class="col-lg-4 col-md-6 d-flex">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm">
                    <button class="btn btn-primary ms-2">Tìm</button>
                </form>
            </div>
            @if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
            <div class="comment-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên nhà sản xuất</th>
                            <th>Trạng Thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nsx_arr as $nsx)
                        <tr>
                            <td>{{ $nsx->id_nsx }}</td>
                            <td>{{ $nsx->ten_nsx }}</td>
                            <td>{{$nsx->anHien==0?'Ẩn':'Hiện'}}</td>
                            <td>
                                <a href="{{ route('nhasanxuat.edit', $nsx->id_nsx) }}">
                                    <button class="btn btn-warning btn-sm">Chỉnh sửa</button>
                                </a>
                                <form action="{{ route('nhasanxuat.destroy', $nsx->id_nsx) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                        </form>

                                            <script>
                                                function confirmDelete() {
                                                    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
                                                }   
                                            </script>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
