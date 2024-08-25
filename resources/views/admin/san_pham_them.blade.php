@extends('admin/layout_admin')
@section('title') Thêm sản phẩm  @endsection
@section('noidungchinh')
<form id="frm" method="post" enctype="multipart/form-data"  action="{{route('sanpham.store')}}"
class="m-auto w-10 border border-primary" > @csrf
    <h4 class="m-0 bg-warning p-2 fs-5"> THÊM SẢN PHẨM</h4>
    <div class="mb-3 row px-2">
        <div class='col-6'> Tên sản phẩm
            <input required name="ten" type="text" class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Số lượng trong kho
            <input required name="soLuong" type="number" class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Giá
          <input required name="gia" type="number" class="form-control shadow-none border-primary" min="1">
        </div>

        <div class='col-6'> Giá km
        <input required name="gia_km" type="number" class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Loại gỗ
          <input required name="loai_go" type="text" class="form-control shadow-none border-primary" min="1">
        </div>

        <div class='col-6'> Kích thước
        <input required name="kich_thuoc" type="text" class="form-control shadow-none border-primary" min="1">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> màu sắc
          <input required name="mau_sac" type="text" class="form-control shadow-none border-primary" min="1">
        </div>

        <div class='col-6'> Bảo hành
        <input required name="bao_hanh" type="number" class="form-control shadow-none border-primary" min="1">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Mô tả
          <input required name="moTa" type="text" class="form-control shadow-none border-primary" min="1">
        </div>

        <div class='col-6'>Hình ảnh
        <input required name="hinh" type="file" class="form-control shadow-none border-primary" >
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
       Chọn nhà sản xuất
        <select name="id_loai" class="form-control shadow-none border-primary">
                @foreach( $nsx_arr as $nsx)
                <option value="{{$nsx->id_nsx}}">{{$nsx->ten_nsx}}</option>
                @endforeach
            </select>
        </div>
        <div class='col-6'>
        Chọn loại sản phẩm
            <select name="loai_sp" required class="form-control shadow-none border-primary">
            @foreach( $loai_arr as $loai)
                <option value="{{$loai->id_loaisp}}">{{$loai->loai}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>  Trạng thái sản phẩm
        <select name="anHien" required class="form-control shadow-none border-primary">
                <option value="1">Hiện sản phẩm</option>3
                <option value="0">Ẩn sản phẩm</option>  
            </select>
        </div>

        <div class='col-6'>Sản phẩm nổi bật
        <select name="hot" required class="form-control shadow-none border-primary">
        <option value="0">Sản phẩm bình thường</option>         
        <option value="1">Sản phẩm hot</option> 
            </select>
        </div>
    </div>

    <div class='mb-3 px-2'>
        <button type="submit" class="btn btn-primary py-2 px-5 border-0"> Lưu database</button>
    </div>
</form>
@endsection
