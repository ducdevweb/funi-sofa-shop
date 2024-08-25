@extends('admin/layout_admin')
@section('title') Danh sách loại sản phẩm  @endsection
@section('noidungchinh')
   <h2 class="p-2 fs-4 bg-info-subtle mb-0">Danh sách loại sản phẩm</h2>
@if(session()->has('thongbao'))
    <div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5  text-center">
        {!! session('thongbao') !!}
    </div>
@endif
   <table class="table table-bordered border border-primary">
    <tr class="text-center">
       <th>id</th> <th>Tên loại</th> <th>Thứ tự</th> <th>Ẩn hiện </th> <th></th>
    </tr>
    @foreach ($nsx_arr as $loai)
<tr class="text-center">
    <td>{{$loai->id_nsx}}</td>
    <td>{{$loai->ten_nsx}}</td>
    <td>{{$loai->thuTu}}</td>
    <td>{{$loai->anHien==1 ? "Đang hiện" : "Đang ẩn"}}</td>
    <td class="text-end">
    <form class="d-inline" action="{{ route('loai.destroy', $loai->id_nsx) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type='submit' onclick="return confirm('Bạn muốn xóa à')" class="btn btn-danger btn-sm ms-1">Xóa</button>
    </form>

    </td>
</tr>
@endforeach

    </table>
    <div class="text-center p-2">{{$nsx_arr->links()}}</div>
@endsection
