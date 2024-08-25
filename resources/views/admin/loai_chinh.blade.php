@extends('admin/layout_admin')
@section('title') Chỉnh loại sản phẩm  @endsection
@section('noidungchinh')
<form  action="{{route('loai.update', $loaisp->id )}}" method="post"
class="m-auto col-10 border border-primary p-3 mt-3 shadow-lg fs-5">
    @csrf @method('PUT')
    <div class='mb-3'>
        <label> Tên loại</label>
        <input name="ten" value="{{$loaisp->ten}}" type="text"
        class="form-control border-primary shadow-none">
    </div>
    <div class='mb-3'>
        <label> Thứ tự</label>
        <input name="thu_tu" value="{{$loaisp->thu_tu}}" type="number"
        class="form-control border-primary shadow-none" min="1">
    </div>
    <div class='mb-3'>
        <label> Ẩn hiện</label>
        <input name="an_hien" {{$loaisp->an_hien==0?"checked":""}} type="radio" value="0"> Ẩn
        <input name="an_hien" type="radio" value="1" {{$loaisp->an_hien==1?"checked":""}} > Hiện
    </div>
    <div class='mb-3'>
        <button type="submit" class="btn btn-success py-2 px-5 border-0"> Lưu database</button>
    </div>
</form>
@endsection
