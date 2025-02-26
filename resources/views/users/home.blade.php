@extends('users.layout')
@section('tieude')
Trang chủ
@endsection
@section('noidung')

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Phong cách hiện đại, <em>Nhà phố</em></span>
          <h2>Khám phá!<br>Những bộ sofa sang trọng cho phòng khách</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Thiết kế tinh tế, <em>Biệt thự</em></span>
          <h2>Trang trí ngay!<br>Những bộ bàn ăn đẹp mắt cho bữa tối</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Nội thất tiện nghi, <em>Căn hộ</em></span>
          <h2>Phục vụ ngay!<br>Những bộ giường ngủ thoải mái nhất</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="buton">
            <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Ưu Đãi Tốt Nhất</h6>
            <h2>Tìm Ưu Đãi Tốt Nhất Cho Nội Thất Ngay Bây Giờ!</h2>
          </div>
        </div>
        <div class="nav-wrapper">
                <ul class="nav nav-tabs qin" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="sofa-tab" data-bs-toggle="tab" data-bs-target="#sofa"
                      type="button" role="tab" aria-controls="sofa" aria-selected="true">Sofa</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button"
                      role="tab" aria-controls="table" aria-selected="false">Bàn Ăn</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bed-tab" data-bs-toggle="tab" data-bs-target="#bed" type="button"
                      role="tab" aria-controls="bed" aria-selected="false">Giường Ngủ</button>
                  </li>
                </ul>
              </div>
        </div>
      

        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row"> 
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="sofa" role="tabpanel" aria-labelledby="sofa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Chất Liệu <span>Da/Nỉ</span></li>
                          <li>Đặc Điểm <span>Đệm êm ái</span></li>
                          <li>Kích Thước <span>2m x 1.5m</span></li>
                          <li>Màu Sắc <span>Xám, Nâu</span></li>
                          <li>Giá <span>10,000,000 VND</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="/assetss/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Thông Tin Thêm Về Sofa</h4>
                      <p>Đây là một chiếc sofa cao cấp với chất liệu da/nỉ, thiết kế hiện đại và đệm êm ái. Phù hợp cho
                        phòng khách của bạn.</p>
                      
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Chất Liệu <span>Gỗ</span></li>
                          <li>Đặc Điểm <span>Chân đế vững chắc</span></li>
                          <li>Kích Thước <span>1.8m x 0.9m</span></li>
                          <li>Màu Sắc <span>Nâu, Đen</span></li>
                          <li>Giá <span>5,000,000 VND</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="/assetss/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Thông Tin Chi Tiết Về Bàn Ăn</h4>
                      <p>Bàn ăn gỗ tự nhiên, thiết kế tinh tế với chân đế vững chắc. Phù hợp với mọi không gian bếp.</p>
                      
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="bed" role="tabpanel" aria-labelledby="bed-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Chất Liệu <span>Gỗ/Metal</span></li>
                          <li>Đặc Điểm <span>Thiết kế sang trọng</span></li>
                          <li>Kích Thước <span>2m x 1.8m</span></li>
                          <li>Màu Sắc <span>Trắng, Xám</span></li>
                          <li>Giá <span>7,000,000 VND</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="/assetss/images/deal-03.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Thông Tin Thêm Về Giường Ngủ</h4>
                      <p>Giường ngủ thiết kế sang trọng với chất liệu gỗ hoặc kim loại, phù hợp với mọi phòng ngủ.</p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- sản phẩm -->
  <div class="properties section">
    <div class="container">
      <div class="row les">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Sản Phẩm</h6>
            <h2>Chúng Tôi Cung Cấp Những Sản Phẩm Nội Thất Tốt Nhất Mà Bạn Thích</h2>
          </div>
        </div>
      </div>


      <h2>SẢN PHẨM <span style="color: #f35525;">ƯU ĐÃI</span></h2>
      <div class="row">
      @foreach ($sp_sale as $sp)
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="item">
                <a href="/godatviet/detail/{{$sp->id_sp}}">
                    <img src="{{$sp->hinh}}" alt="Sofa" style="height:300px;">
                    @php
                        $giasale = $sp->giaSale;
                        $giasp = $sp->gia_sp;
                        $discount = round(($giasp - $giasale) * 100 / $giasp);
                    @endphp
                    <span class="discount-label">
                        {{$discount}}%
                    </span>
                </a>
                <span class="category">{{$sp->danhmuc->loai}}</span> <br>
                <h4><a href="/godatviet/shop/{{$sp->id_sp}}">{{$sp->ten_sp}}</a></h4>
                <h6 class="price">{{$sp->giaSale}}<span class="original-price">{{$sp->gia_sp}}</span></h6> <br>
                
                <ul>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                    <span style="color: #f35525;">
                        @php
                            $total_star = $sp->binhluans->sum('danhgia'); 
                            $count_star = $sp->binhluans->count(); 
                            $star = $count_star > 0 ? $total_star / $count_star : 0;
                        @endphp
                        
                        @for ($i = 1; $i <= floor($star); $i++) 
                            <i class="fas fa-star"></i>
                        @endfor
                        
                        @if ($star - floor($star) >= 0.5) 
                            <i class="fas fa-star-half-alt"></i>
                        @endif

                        <span class="sold">Đã bán: ({{$sp->luot_mua}})</span>
                    </span> <br>
                </ul>
            </div>
        </div>
    @endforeach
      </div>
      <div class="underline"></div>

      <h2>SẢN PHẨM <span style="color: #f35525;">MỚI</span></h2>
      <div class="row">
        @foreach ($sp_new as $sp)
        <div class="col-lg-4 col-md-6">
          <div class="item">
                <a href="/godatviet/shop/{{$sp->id_sp}}">
                    <img src="{{$sp->hinh}}" alt="Sofa" >
                    <span class="discount-label">NEW</span>
                </a>
                <span class="category">{{$sp->danhmuc->loai}}</span> <br>
                <h4><a href="/godatviet/shop/{{$sp->id_sp}}">{{$sp->ten_sp}}</a></h4>
                <h6 class="price">{{$sp->giaSale>0?$sp->giaSale:$sp->gia_sp}}<span class="original-price">{{$sp->giaSale>0?$sp->gia_sp:""}}</span></h6> <br>
                
                <ul>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                    <span style="color: #f35525;">
                        @php
                            $total_star = $sp->binhluans->sum('danhgia'); 
                            $count_star = $sp->binhluans->count(); 
                            $star = $count_star > 0 ? $total_star / $count_star : 0;
                        @endphp
                        
                        @for ($i = 1; $i <= floor($star); $i++) 
                            <i class="fas fa-star"></i>
                        @endfor
                        
                        @if ($star - floor($star) >= 0.5) 
                            <i class="fas fa-star-half-alt"></i>
                        @endif

                        <span class="sold">Đã bán: ({{$sp->luot_mua}})</span>
                    </span> <br>
                </ul>
            </div>
        </div>
         @endforeach
       
      </div>
      <div class="underline"></div>
      <h2>SẢN PHẨM <span style="color: #f35525;">BÁN CHẠY</span></h2>
      <div class="row">
        @foreach ($sp_hot as $sp)
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/godatviet/shop/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt="Sofa"></a>
            <span class="category">{{$sp->danhmuc->loai}}</span> <br>
            <h4><a href="/godatviet/shop/{{$sp->id_sp}}">{{$sp->ten_sp}}</a></h4>
            <h6 class="price">{{$sp->giaSale>0?$sp->giaSale:$sp->gia_sp}}<span class="original-price">{{$sp->giaSale>0?$sp->gia_sp:""}}</span></h6> <br>

            <ul>
              <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                <span style="color: #f35525;">
                        @php
                            $total_star = $sp->binhluans->sum('danhgia'); 
                            $count_star = $sp->binhluans->count(); 
                            $star = $count_star > 0 ? $total_star / $count_star : 0;
                        @endphp
                        
                        @for ($i = 1; $i <= floor($star); $i++) 
                            <i class="fas fa-star"></i>
                        @endfor
                        
                        @if ($star - floor($star) >= 0.5) 
                            <i class="fas fa-star-half-alt"></i>
                        @endif

                        <span class="sold">Đã bán: ({{$sp->luot_mua}})</span>
                    </span>  <br>
            </ul>
   
          </div>
        </div>
         @endforeach
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Liên Hệ Với Chúng Tôi</h6>
            <h2>Liên Hệ Với Các Đại Lý Của Chúng Tôi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection