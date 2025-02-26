  @extends('users.layout')
  @section('tieude')
  Trang chi tiết sản phẩm
  @endsection
  @section('noidung')
  <style>

  .color-sample.single-color {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #ddd;
    display: inline-block;
    margin-right: 10px;
  }

  .color-name {
    font-size: 16px;
    vertical-align: middle;
    color: #333;
  }

  .color-sample.brown { background-color: #8B4513; }

  .size-option.single-size {
    padding: 10px 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    display: inline-block;
    font-size: 16px;
    color: #333;
  }

  </style>
  <div class="single-property section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="main-image">
              <span class="category">Category</span>
              <img id="mainImage" src="{{$detail->hinh}}" alt="">
            </div>
    
            <div class="main-imagex row">
              <div class="col-lg-2">
                <div class="main-images">
                  <img src="{{$detail->hinh_1}}" alt="">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="main-images">
                  <img src="{{$detail->hinh_2}}" alt="">
                </div>
              </div>
            </div>
    
          </div>
    
          <div class="col-lg-4 mas">
    <div class="info-table">
      <ul>
        <li>
          <h4>{{ $detail->ten_sp }}</h4>
          <span style="color: #f35525;">
            @php
              $total_star = $detail->binhluans->sum('danhgia');
              $count_star = $detail->binhluans->count();
              $star = $count_star > 0 ? $total_star / $count_star : 0;
            @endphp

            @for ($i = 1; $i <= floor($star); $i++) 
              <i class="fas fa-star"></i>
            @endfor

            @if ($star - floor($star) >= 0.5) 
              <i class="fas fa-star-half-alt"></i>
            @endif

            <span class="sold">Đã bán: ({{ $detail->luot_mua }})</span>
          </span>
        </li>
        <li>
        <h6 class="price">{{$detail->giaSale>0?$detail->giaSale:$detail->gia_sp}}<span class="original-price">
        {{$detail->giaSale>0?$detail->gia_sp:""}}</span></h6> <br>
        </li>

        <li>
          <h6>Màu sắc của gỗ</h6>
          <span class="color-name">{{$detail->mau_sac}}</span>:
          <div class="color-sample single-color brown" title="Màu Nâu"></div>

        </li>
        <li>
          <h6>Kích thước</h6>
          <div class="size-option single-size">{{$detail->kich_thuoc}}</div>
        </li>
        <li>
          <h4>Thông tin</h4>
          <p class="chu">
          {!!$detail->thong_tin!!}
          </p>
          <p>Bảo hành: {{$detail->bao_hanh}}</p>
        </li>

        <!-- Số lượng -->
        <li>
          <div class="quantity-wrapper">
            <button class="btn btn-decrement">-</button>
            <input type="number" class="form-control text-center quantity-input" value="1" min="1">
            <button class="btn btn-increment">+</button>
          </div>
        </li>
        <li>
          <div class="icon-button">
            <a href="" class="buy-now">Mua ngay</a>
            <a href="/godatviet/addCart/{{$detail->id_sp}}" class="add-to-cart">THÊM VÀO GIỎ</a>
          </div>
        </li>
      </ul>
    </div>
  </div>

    
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  Mô tả <i class="fa-solid fa-caret-down" style="color: #1e1e1e;     margin-left: 12px;"></i>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="info-container">
                    <div class="info-left">

                      <div class="info-right">
                        <img src="{{$detail->hinh}}" class="image-detail" alt="Hình ảnh sản phẩm">
                      </div>
                      {!!$detail->moTa!!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Đánh giá (241) <i class="fa-solid fa-caret-down" style="color: #1e1e1e;     margin-left: 12px;"></i>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <!-- Đánh giá 1 -->
                  <div class="review">
                    <strong>Nguyễn Văn A</strong> -
                    <span style="color: #f35525;">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </span>
                    - Chất lượng sản phẩm<br>
                    "Sản phẩm rất đẹp và chắc chắn, màu sắc đúng như hình, giao hàng nhanh và đóng gói cẩn thận."<br>
                    <img src="assets/images/anh1.jpeg" alt="Hình ảnh sản phẩm" style="width: 20%;">
                  </div>
                  <hr>
                  <!-- Đánh giá 2 -->
                  <div class="review">
                    <strong>Trần Thị B</strong> -
                    <span style="color: #f35525;">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </span>
                    - Thiết kế và mẫu mã<br>
                    "Thiết kế đẹp nhưng hơi khác một chút so với hình ảnh trên web. Tuy nhiên vẫn hài lòng với sản phẩm."<br>
                    <img src="assets/images/anh1.jpeg" alt="Hình ảnh sản phẩm" style="width: 20%;">
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Viết đánh giá của bạn <i class="fa-solid fa-caret-down" style="color: #1e1e1e;     margin-left: 12px;"></i> 
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <form id="reviewForm">
                    <div class="mb-3">
                      <label for="name" class="form-label">Tên của bạn</label>
                      <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn" required>
                    </div>
            
                    <div class="mb-3">
                      <label for="rating" class="form-label">Đánh giá của bạn (từ 1 đến 5 sao)</label>
                      <select class="form-select" id="rating" required>
                        <option value="">Chọn số sao</option>
                        <option value="1">1 sao</option>
                        <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option>
                      </select>
                    </div>
            
                    <div class="mb-3">
                      <label for="comment" class="form-label">Nhận xét của bạn</label>
                      <textarea class="form-control" id="comment" rows="3" placeholder="Nhập nhận xét của bạn" required></textarea>
                    </div>
            
                    <div class="mb-3">
                      <label for="reviewImage" class="form-label">Tải lên hình ảnh sản phẩm (tuỳ chọn)</label>
                      <input type="file" class="form-control" id="reviewImage">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="properties section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 offset-lg-4">
            <div class="section-heading text-center">
              <h6>| Sản Phẩm</h6>
              <h2> Sản phẩm liên quan</h2>
            </div>
          </div>
        </div>
        <div class="row">
        @foreach ($sp_relate as $sp)
          <div class="col-lg-4 col-md-6">
            <div class="item">
              <a href="/godatviet/detail/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt="Sofa"></a>
              <span class="category">{{$sp->danhmuc->loai}}</span> <br>
              <h4><a href="/godatviet/detail/{{$sp->id_sp}}">{{$sp->ten_sp}}</a></h4>
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
                      </span<br>
              </ul>
      
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  @endsection