@extends('admin/layout_admin')
@section('title') Danh sách sản phẩm @endsection
@section('noidungchinh')
@if(session()->has('thongbao_ad'))
    <div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5 text-center">
        {!! session('thongbao_ad') !!}
    </div>
@endif
<style>
    .table-responsive {
   width: 120%;
}

</style>
<div class="container-fluid my-4">
    <div class="table-responsive product-table">
        <table class="table table-striped table-hover table-bordered m-auto" id="dssanpham">
            <caption class="caption-top bg-warning text-center py-2 fw-bold">DANH SÁCH SẢN PHẨM</caption>
            <thead class="thead-dark">
                <tr>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ngày đăng</th>
                    <th>Loại gỗ</th>
                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Nhà sản xuất</th>
                    <th>Bảo hành</th>
                    <th>Trạng thái</th>
                    <th>Sửa Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanpham_arr as $sp)
                <tr>
                    <td><img src="{{$sp->hinh}}" class="img-fluid" width="120" height="80"></td>
                    <td><b>{{$sp->ten_sp}}</b><br>Lượt xem: {{$sp->luotXem}}</td>
                    <td>Giá: {{ number_format($sp->gia_sp, 0, ',', '.') }}<br>
                        KM :  {{ number_format($sp->giaSale, 0, ',', '.') }}</td>
                    <td>{{ date('d/m/Y', strtotime($sp->ngayDang)) }}</td>
                    <td>{{ $sp->loai_go }}</td>
                    <td>{{ $sp->mau_sac }}</td>
                    <td>{{ $sp->kich_thuoc }}</td>
                    <td>
                        @if($sp->nsx)
                            {{ $sp->nsx->ten_nsx }}
                        @else
                            <span class="text-danger">Vui lòng cập nhật nhà sản xuất</span>
                        @endif
                    </td>
                    <td>{{ $sp->bao_hanh }}</td>
                    <td>
                        Ẩn hiện: {{ ($sp->anHien == 0) ? "Đang ẩn" : "Đang hiện" }}<br>
                        Nổi bật: {{ ($sp->hot == 0) ? "Bình thường" : "Nổi bật" }}
                    </td>
                    <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a class="btn btn-primary btn-sm" href="{{ route('sanpham.edit', $sp->id_sp) }}">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form class="d-inline" action="{{ route('sanpham.destroy', $sp->id_sp) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </div>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $sanpham_arr->links() }}
    </div>
</div>
@endsection
