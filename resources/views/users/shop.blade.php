@extends('users.layout')
@section('tieude')
Trang sản phẩm
@endsection
@section('noidung')
<div class="page-heading header-text">
        </div>
        <div class="section properties">
            <div class="container">
                <div class="section properties">
                    <div class="container">
                        <section class="filters">
                            <div class="moni">
                                <h1>Các sản phẩm </h1>
                                <div class="filter-group dropdown">
                                    <h6 onclick="toggleDropdown()">bán chạy nhất  </h6> 
                                    <ul class="dropdown-content">
                                      <li><a href="/godatviet/shop?action=hot">Sản phẩm nổi bật</a></li>
                                      <li><a href="/godatviet/shop?action=asc">Giá: Tăng dần</a></li>
                                      <li><a href="/godatviet/shop?action=desc">Giá: Giảm dần</a></li>
                                      <li><a href="/godatviet/shop?action=new">Mới nhất</a></li>
                                      <li><a href="/godatviet/shop?action=best">Bán chạy nhất</a></li>
                                  </ul>

                                </div>
                            </div>
  
                            <div class="menu">
                                <div class="filter-group dropdown">
                                    <h6 onclick="toggleDropdown()">Danh Mục</h6>
                                    <ul class="dropdown-content">
                                    @foreach ($loai_sp as $loai)
                                        <li><a href="/godatviet/shop?id_loaisp={{ $loai->id_loaisp }}&action=filter_cate">{{ $loai->loai }}</a></li>
                                    @endforeach

                                    </ul>
                                </div>
                                
                                <div class="filter-group dropdown">
                                    <h6 onclick="toggleDropdown()">Giá sản phẩm</h6>
                                    <ul class="dropdown-content">
                                        <li><a href="/godatviet/shop?action=price"> Tất cả </a></li>
                                        <li><a href="/godatviet/shop?action=under500000"> Dưới 500,000₫ </a></li>
                                        <li><a href="/godatviet/shop?action=500000-1000000"> 500,000₫ - 1,000,000₫ </a></li>
                                        <li><a href="/godatviet/shop?action=1000000-1500000"> 1,000,000₫ - 1,500,000₫ </a></li>
                                        <li><a href="/godatviet/shop?action=1500000-2000000"> 1,500,000₫ - 2,000,000₫ </a></li>
                                        <li><a href="/godatviet/shop?action=above3000000"> Trên 3,000,000₫ </a></li>
                                    </ul>
                                </div>
                                <div class="filter-group dropdown">
                                    <h6 onclick="toggleDropdown()">Loại gỗ</h6>
                                    <ul class="dropdown-content">
                                      <li><input type="checkbox"> Tất cả</li>
                                      <li><input type="checkbox"> Gỗ Gõ Đỏ</li>
                                      <li><input type="checkbox"> Gỗ Hương</li>
                                      <li><input type="checkbox">Gỗ Lim</li>
                                      <li><input type="checkbox"> Gỗ Sồi</li>
                                      <li><input type="checkbox"> Gỗ Óc Chó</li>
                                </div>
                                
                                
                                
                                <div class="filter-group dropdown">
                                    <h6 onclick="toggleDropdown()">Nhà Sản Xuất</h6>
                                    <ul class="dropdown-content">
                                      @foreach ($nsx as $n)
                                        <li><a href="/godatviet/shop?id_nsx={{$n->id_nsx}}&action=filter_manufacturer">{{$n->ten_nsx}} </a></li>
                                      @endforeach
                                   
                                    </ul>
                                </div>
                            </div>
                        </section>
  
  
                    </div>
                </div>
                <div class="row ">
                @foreach ($sanpham_arr as $sp)
                  <div class="col-lg-4 col-md-6">
                    <div class="item">
                      <a href="/godatviet/detail/{{$sp->id_sp}}"><img src="{{$sp->hinh}}"   alt=""></a>
                      <span class="category">{{$sp->danhmuc->loai}}</span> <br>
                      <h4><a href="/godatviet/detail/{{$sp->id_sp}}">{{$sp->ten_sp}}</a></h4>
                      <h6 class="price">{{$sp->giaSale>0?$sp->giaSale:$sp->gia_sp}}<span class="original-price">{{$sp->Sale>0?$gia_sp:""}}</span></h6> <br>
                      <ul>
                        <link rel="stylesheet"
                          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                    <span style="color: #f35525;">
                        @php
                        $total_star = $sp->binhluans->sum('danhgia');
                        $count_star = $sp->binhluans->count();
                        $star = $count_star > 0 ? $total_star / $count_star : 0;
                        @endphp
                        @if (floor($star)>0)
                        @for ($i = 1; $i <= floor($star); $i++) 
                        <i class="fas fa-star"></i>
                        @endfor

                        @if ($star - floor($star) >= 0.5) 
                        <i class="fas fa-star-half-alt"></i>
                        @endif
                        @else
                            Chưa có đánh giá nào cho sản phẩm
                        @endif
                        <span class="sold">Đã bán: ({{ $sp->luot_mua }})</span>
                    </span><br>
                      </ul>
                    </div>
                  </div>  
                    @endforeach
                </div>
                  <div class="row">
                  <div class="col-lg-12">
                      <ul class="pagination">

                          @if ($sanpham_arr->onFirstPage())
                              <li class="disabled"><span><i class="fa fa-angle-left"></i></span></li>
                          @else
                              <li><a href="{{ $sanpham_arr->previousPageUrl() }}&action={{ request()->query('action') }}&id_nsx={{ request()->query('id_nsx') }}&id_loaisp={{ request()->query('id_loaisp') }}"><i class="fa fa-angle-left"></i></a></li>
                          @endif

                          @foreach ($sanpham_arr->getUrlRange(1, $sanpham_arr->lastPage()) as $page => $url)
                              @if ($page == $sanpham_arr->currentPage())
                                  <li class="active"><a href="#">{{ $page }}</a></li>
                              @else
                                  <li><a href="{{ $url }}&action={{ request()->query('action') }}&id_nsx={{ request()->query('id_nsx') }}&id_loaisp={{ request()->query('id_loaisp') }}">{{ $page }}</a></li>
                              @endif
                          @endforeach

                          @if ($sanpham_arr->hasMorePages())
                              <li><a href="{{ $sanpham_arr->nextPageUrl() }}&action={{ request()->query('action') }}&id_nsx={{ request()->query('id_nsx') }}&id_loaisp={{ request()->query('id_loaisp') }}"><i class="fa fa-angle-right"></i></a></li>
                          @else
                              <li class="disabled"><span><i class="fa fa-angle-right"></i></span></li>
                          @endif

                      </ul>
                  </div>
              </div>
                  
            </div>
        </div
   @endsection