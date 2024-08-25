@extends('layout')

@section('tieude')
Dịch vụ
@endsection

@section('noidung')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Dịch Vụ</h1>
                    <p class="mb-4">Chúng tôi cung cấp các dịch vụ chất lượng cao với sự chăm sóc tận tâm. Chúng tôi cam kết mang lại những trải nghiệm tốt nhất cho khách hàng.</p>
                    <p><a href="/shop" class="btn btn-secondary me-2">Mua Ngay</a><a href="/shop" class="btn btn-white-outline">Khám Phá</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="/assets/images/couch.png" class="img-fluid" alt="Sofa">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row my-5">
            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="/assets/images/truck.svg" alt="Giao hàng" class="img-fluid">
                    </div>
                    <h3>Giao Hàng Nhanh &amp; Miễn Phí</h3>
                    <p>Chúng tôi cam kết giao hàng nhanh chóng và miễn phí cho tất cả các đơn hàng.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="/assets/images/bag.svg" alt="Mua sắm dễ dàng" class="img-fluid">
                    </div>
                    <h3>Mua Sắm Dễ Dàng</h3>
                    <p>Trải nghiệm mua sắm dễ dàng với giao diện người dùng thân thiện và dễ sử dụng.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="/assets/images/support.svg" alt="Hỗ trợ 24/7" class="img-fluid">
                    </div>
                    <h3>Hỗ Trợ 24/7</h3>
                    <p>Chúng tôi cung cấp hỗ trợ 24/7 để giải đáp mọi thắc mắc của bạn.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="/assets/images/return.svg" alt="Đổi trả dễ dàng" class="img-fluid">
                    </div>
                    <h3>Đổi Trả Dễ Dàng</h3>
                    <p>Chúng tôi hỗ trợ đổi trả hàng hóa dễ dàng và không gặp rắc rối.</p>
                </div>
            </div>

            <!-- Các phần tử lặp lại -->
        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Product Section -->
<div class="product-section pt-0">
    <div class="container">
        <div class="row">
            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Chế Tạo Từ Vật Liệu Tuyệt Hảo.</h2>
                <p class="mb-4">Chúng tôi sử dụng vật liệu chất lượng cao để chế tạo sản phẩm, đảm bảo sự bền bỉ và thẩm mỹ.</p>
                <p><a href="#" class="btn">Khám Phá</a></p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="#">
                    <img src="/assets/images/product-1.png" class="img-fluid product-thumbnail" alt="Nordic Chair">
                    <h3 class="product-title">Ghế Nordic</h3>
                    <strong class="product-price">$50.00</strong>
                    <span class="icon-cross">
                        <img src="/assets/images/cross.svg" class="img-fluid" alt="X">
                    </span>
                </a>
            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="#">
                    <img src="/assets/images/product-2.png" class="img-fluid product-thumbnail" alt="Kruzo Aero Chair">
                    <h3 class="product-title">Ghế Kruzo Aero</h3>
                    <strong class="product-price">$78.00</strong>
                    <span class="icon-cross">
                        <img src="/assets/images/cross.svg" class="img-fluid" alt="X">
                    </span>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="#">
                    <img src="/assets/images/product-3.png" class="img-fluid product-thumbnail" alt="Ghế Ergonomic">
                    <h3 class="product-title">Ghế Ergonomic</h3>
                    <strong class="product-price">$43.00</strong>
                    <span class="icon-cross">
                        <img src="/assets/images/cross.svg" class="img-fluid" alt="X">
                    </span>
                </a>
            </div>
            <!-- End Column 4 -->
        </div>
    </div>
</div>
<!-- End Product Section -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Nhận Xét Từ Khách Hàng</h2>
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
                        <!-- Start Item -->
                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">
                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Chúng tôi rất hài lòng với dịch vụ mà bạn cung cấp. Sản phẩm chất lượng và hỗ trợ tuyệt vời. Rất đáng để thử!&rdquo;</p>
                                        </blockquote>
                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="/assets/images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">Giám Đốc Điều Hành, XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->
                        <!-- Các phần tử lặp lại -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
