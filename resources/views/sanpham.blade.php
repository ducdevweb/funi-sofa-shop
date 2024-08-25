@extends('layout')
@section('tieude')
    Shop sofa uy tín
@endsection
@section('noidung')
<div class="hero">
<div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1> <span clsas="d-block">Cửa hàng của chúng tôi</span></h1>
                    <p class="mb-4">Tất cả các sản phẩm của cửa hàng đều được nhập khẩu từ các thương hiệu lớn</p>
                    <p><a href="/shop" class="btn btn-secondary me-2">Mua Ngay</a><a href="/shop" class="btn btn-white-outline">Khám Phá</a></p>    
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="/assets/images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
  
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <h4>Tìm kiếm</h4>
                <form action="/search" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Nhập tên sản phẩm...">
                    </div>
                    <button type="submit" class="btn btn-search">Tìm kiếm</button>
                </form>

                <h4>Danh mục</h4>
                <ul class="list-group">
                    @foreach ($loai_sp as $loai)
                        <li class="list-group-item">
                            <a href="/sptheoloai/{{$loai->id_loaisp}}">
                                {{$loai->loai}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <h4>Nhà sản xuất</h4>
                <ul class="list-group">
                    @foreach ($nsx as $item)
                        <li class="list-group-item">
                            <a href="/sptheonhasx/{{$item->id_nsx}}">
                                {{$item->ten_nsx}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach ($sanpham as $sp)
                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="product-item">
                            <a href="/sp/{{$sp->id_sp}}">
                                <div class="position-relative">
                                    <img src="{{$sp->hinh}}" class="imgpr img-fluid product-thumbnail" alt="{{$sp->ten_sp}}">
                                    @if ($sp->giaSale < $sp->gia_sp && $sp->giaSale>1)
                                        <div class="product-sale">
                                            Sale còn: {{number_format($sp->giaSale,0,",",".")}} vnđ
                                        </div>
                                    @endif
                                </div>
                                <h3 class="product-title">{{$sp->ten_sp}}</h3>
                                @if ($sp->giaSale < $sp->gia_sp && $sp->giaSale > 1)
                                    <del class="product-price del">{{number_format($sp->gia_sp,0,",",".")}} vnđ</del>
                                @else
                                    <div class="product-price">{{number_format($sp->gia_sp,0,",",".")}} vnđ</div>
                                @endif
                            </a>
                            @if ($sp->soLuong == 0 || $sp->soLuong < 0)
                            <a href="#" class="icon-cross">
                                Tạm hết
                            </a>
                        @else
                            <a href="/addCart/{{$sp->id_sp}}" class="icon-cross">
                                <img src="/assets/images/cross.svg" class="img-fluid" alt="icon">
                            </a>
                        @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
