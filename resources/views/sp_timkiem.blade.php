@extends('layout')
@section('tieude')
    Shop sofa uy tín
@endsection
@section('noidung')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Chào mừng đến với Shop Sofa</h1>
                    <p class="lead">Khám phá những sản phẩm sofa chất lượng cao với giá tốt nhất.</p>
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
                @foreach ($results as $sp)
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
