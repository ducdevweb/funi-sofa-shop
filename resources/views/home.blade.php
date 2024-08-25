@extends('layout')
@section('tieude')
    Shop sofa uy tín
@endsection
@section('noidung')
<!-- Start Hero Section -->
 <style>
    .imgpr{
	height: 300px;
    
}

.product-item a {
        display: inline-block;
        padding: 10px 20px;
 
        color: #fff;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }
 </style>
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Studio <span clsas="d-block">Thiết Kế Nội Thất Hiện Đại</span></h1>
                    <p class="mb-4">Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>
                    <p><a href="" class="btn btn-secondary me-2">Mua Ngay</a><a href="#" class="btn btn-white-outline">Khám Phá</a></p>
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
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Sản phẩm có nhiều lượt xem nhất</h2>
                <p class="mb-4">Đây là 3 sản phẩm có nhiều lượt xem nhất của chúng tôi.3 sản phẩm có chất lượng tốt nhất và được yêu thích nhất của chúng tôi</p>
                <p><a href="shop.html" class="btn">Khám Phá</a></p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            @foreach ($sanphamdemo as $sanphamdemo)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-item">
                        <a href="/sp/{{$sanphamdemo->id_sp}}">
                            <img src="{{$sanphamdemo->hinh}}" class="img-fluid product-thumbnail imgpr" alt="{{$sanphamdemo->ten_sp}}">
                            <h3 class="product-title">{{$sanphamdemo->ten_sp}}</h3>
                            <strong class="product-price">{{number_format($sanphamdemo->gia_sp,0,",",".")}} vnđ</strong>
                        </a>
                        <a href="/addCart/{{$sanphamdemo->id_sp}}" class="icon-cross">
                            <img src="/assets/images/cross.svg" class="img-fluid" alt="icon">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">Tại Sao Chọn Chúng Tôi</h2>
                <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/truck.svg" alt="Hình ảnh" class="imf-fluid">
                            </div>
                            <h3>Giao Hàng Nhanh &amp; Miễn Phí</h3>
                            <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/bag.svg" alt="Hình ảnh" class="imf-fluid">
                            </div>
                            <h3>Dễ Dàng Mua Sắm</h3>
                            <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/support.svg" alt="Hình ảnh" class="imf-fluid">
                            </div>
                            <h3>Hỗ Trợ 24/7</h3>
                            <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/return.svg" alt="Hình ảnh" class="imf-fluid">
                            </div>
                            <h3>Đổi Trả Không Khó Khăn</h3>
                            <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="/assets/images/why-choose-us-img.jpg" alt="Hình ảnh" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1"><img src="/assets/images/img-grid-1.jpg" alt="Untree.co"></div>
                    <div class="grid grid-2"><img src="/assets/images/img-grid-2.jpg" alt="Untree.co"></div>
                    <div class="grid grid-3"><img src="/assets/images/img-grid-3.jpg" alt="Untree.co"></div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4">Chúng Tôi Giúp Bạn Tạo Ra Thiết Kế Nội Thất Hiện Đại</h2>
                <p>Thực hiện các bước để tìm ra cách kết hợp các giải pháp. Không nên bỏ qua các yếu tố quan trọng. Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn. Các yếu tố thiết kế cần được cân nhắc kỹ lưỡng để đạt được kết quả tốt nhất.</p>

                <ul class="list-unstyled custom-list my-4">
                    <li>Thực hiện các bước để tìm ra cách kết hợp các giải pháp</li>
                    <li>Không nên bỏ qua các yếu tố quan trọng</li>
                    <li>Các phương pháp phải phù hợp với mục tiêu và yêu cầu của bạn</li>
                    <li>Các yếu tố thiết kế cần được cân nhắc kỹ lưỡng</li>
                </ul>
                <p><a herf="#" class="btn">Khám Phá</a></p>
            </div>
        </div>
    </div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product -->
<div class="popular-product">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="product-item-sm d-flex">
                    <div class="thumbnail">
                        <img src="/assets/images/product-1.png" alt="Hình ảnh" class="img-fluid">
                    </div>
                    <div class="pt-3">
                        <h3>Ghế Nordic</h3>
                        <p>$50.00</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="product-item-sm d-flex">
                    <div class="thumbnail">
                        <img src="/assets/images/product-2.png" alt="Hình ảnh" class="img-fluid">
                    </div>
                    <div class="pt-3">
                        <h3>Ghế Kruzo Aero</h3>
                        <p>$78.00</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="product-item-sm d-flex">
                    <div class="thumbnail">
                        <img src="/assets/images/product-3.png" alt="Hình ảnh" class="img-fluid">
                    </div>
                    <div class="pt-3">
                        <h3>Ghế Ergonomic</h3>
                        <p>$43.00</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Popular Product -->
<!-- Bắt đầu phần Slider Đánh Giá -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Nhận Xét</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">
                        
                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Dịch vụ của họ thật tuyệt vời! Tôi rất hài lòng với cách họ xử lý yêu cầu của tôi và chất lượng sản phẩm. Tôi chắc chắn sẽ quay lại trong tương lai.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="/assets/images/person-1.png" alt="Nguyễn Văn A" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Nguyễn Văn Huy</h3>
                                            <span class="position d-block mb-3">Giám đốc, ABC Corp.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- KẾT THÚC mục -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Tôi rất ấn tượng với sự chuyên nghiệp và sự chăm sóc tận tình mà tôi nhận được. Sản phẩm hoàn hảo và dịch vụ khách hàng là xuất sắc.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="/assets/images/person_2.jpg" alt="Trần Thị B" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Trần Thị Bưởi</h3>
                                            <span class="position d-block mb-3">Giám đốc điều hành, DEF Ltd.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- KẾT THÚC mục -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Dịch vụ và sản phẩm tại đây luôn vượt trên mong đợi của tôi. Tôi cảm thấy hài lòng khi hợp tác và sẽ giới thiệu cho bạn bè và gia đình.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="/assets/images/person_3.jpg" alt="Lê Văn C" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Lê Văn Giang</h3>
                                            <span class="position d-block mb-3">Quản lý, GHI Enterprises</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- KẾT THÚC mục -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc phần Slider Đánh Giá -->

<!-- Bắt đầu phần Blog -->
<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h2 class="section-title">Blog Gần Đây</h2>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a href="#" class="more">Xem Tất Cả Bài Viết</a>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-1.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">Ý Tưởng Cho Người Mới Mua Nhà Lần Đầu</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Nguyễn Thị D</a></span> <span>vào <a href="#">Ngày 19 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-2.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">Cách Giữ Cho Nội Thất Của Bạn Luôn Sạch Sẽ</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Lê Văn E</a></span> <span>vào <a href="#">Ngày 15 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-3.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">    
                        <h3><a href="#">Ý Tưởng Nội Thất Cho Không Gian Nhỏ</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Nguyễn Thị F</a></span> <span>vào <a href="#">Ngày 12 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Kết thúc phần Blog -->

@endsection