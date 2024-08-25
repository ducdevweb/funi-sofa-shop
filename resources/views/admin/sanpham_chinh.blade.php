@extends('admin/layout_admin')
@section('noidungchinh')
<form id="frm" method="POST" enctype="multipart/form-data" action="{{ route('sanpham.update', $sp->id_sp) }}" class="m-auto w-10 border border-primary"> 
    @csrf 
    @method('PUT')
    <h4 class="m-0 bg-warning p-2 fs-5"> CHỈNH SẢN PHẨM</h4>
    <div class="mb-3 row px-2">
        <div class='col-6'> Tên sản phẩm 
            <input name="ten_sp" type="text" value="{{ $sp->ten_sp }}" class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Ngày 
            <input name="ngayDang" type="date" value="{{ $sp->ngayDang }}" class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Giá  
            <input name="gia_sp" type="number" value="{{ $sp->gia_sp }}" class="form-control shadow-none border-primary" min="1">
        </div>
        <div class='col-6'> Giá khuyến mãi
            <input name="giaSale" type="number" value="{{ $sp->giaSale }}" class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">    
        <div class='col-6'> 
            <select name="id_loaisp" class="form-control shadow-none border-primary">
                @foreach($loai_arr as $loai)
                <option value="{{ $loai->id_loaisp }}" {{ $loai->id_loaisp == $sp->id_loaisp ? "selected" : "" }}>{{ $loai->loai }}</option>
                @endforeach
            </select>
        </div>   
        <div class='col-6'>
        Chọn nhà sản xuất
            <select name="nsx" class="form-control shadow-none border-primary">
            <option value="0" disabled >-Chọn nhà sản xuất-</option>
                @foreach( $nsx_arr as $nsx)                    
                <option value="{{$nsx->id_nsx}}">{{$nsx->ten_nsx}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class='mb-3 row px-2'>
    <div class='col-6 p-2'>
        <input type="hidden" name="hinhcu" value="{{ $sp->hinh }}">
        <img src="{{ $sp->hinh }}" width="300" height="100" alt="Hình sản phẩm hiện tại">
        <input name="hinh" type="file" class="form-control shadow-none border-primary" placeholder="Hình sản phẩm">
    </div> 
    <div class='col-3 pt-3'>
        <select name="anHien" class="form-control shadow-none border-primary">
            <option value="0" {{ $sp->anHien == 0 ? "selected" : "" }}>Ẩn</option>
            <option value="1" {{ $sp->anHien == 1 ? "selected" : "" }}>Hiện</option>
        </select>
    </div>
    <div class='col-3 text-end pt-3 pe-3'>
        <select name="hot" class="form-control shadow-none border-primary">
            <option value="0" {{ $sp->hot == 0 ? "selected" : "" }}>Bình thường</option>
            <option value="1" {{ $sp->hot == 1 ? "selected" : "" }}>Nổi bật</option>
        </select>
    </div>
</div>

    <div class='mb-3 px-2'>
        <textarea name="moTa" rows="4" placeholder="Mô tả sản phẩm" class="form-control shadow-none border-primary">{{ $sp->moTa }}</textarea>
    </div>
    <div class='mb-3 px-2'> 
        <button type="submit" class="btn btn-primary py-2 px-5 border-0"> Lưu database</button>
    </div>
</form>


@endsection