@extends('layout')

@section('tieude')
Bài viết
@endsection

@section('noidung')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
            <div class="intro-excerpt">
    <h1>Blog của Chúng Tôi</h1>
    <p class="mb-4">Chào mừng bạn đến với blog của chúng tôi! Tại đây, chúng tôi chia sẻ những bài viết chất lượng về
         các xu hướng nội thất, mẹo trang trí nhà cửa, và các ý tưởng thiết kế sáng tạo. .</p>
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
<!-- Kết thúc phần Hero -->

<!-- Bắt đầu phần Blog -->
<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-1.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">Ý Tưởng Cho Chủ Nhà Lần Đầu</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Kristin Watson</a></span> <span>vào <a href="#">19 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-2.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">Cách Giữ Cho Nội Thất Của Bạn Sạch Sẽ</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Robert Fox</a></span> <span>vào <a href="#">15 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">
                    <a href="#" class="post-thumbnail"><img src="/assets/images/post-3.jpg" alt="Hình ảnh" class="img-fluid"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">Ý Tưởng Nội Thất Cho Căn Hộ Diện Tích Nhỏ</a></h3>
                        <div class="meta">
                            <span>bởi <a href="#">Kristin Watson</a></span> <span>vào <a href="#">12 Tháng 12, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Các mục Blog tiếp theo giống như trên, chỉ cần lặp lại các div class="col-12 col-sm-6 col-md-4 mb-5" với nội dung và hình ảnh tương ứng -->

        </div>
    </div>
</div>
<!-- Kết thúc phần Blog -->

<!-- Bắt đầu phần Slider Đánh Giá -->
<div class="testimonial-section before-footer-section">
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
                                            <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="/assets/images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">Giám Đốc Điều Hành, Đồng Sáng Lập, XYZ Inc.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Kết thúc mục -->

                        <!-- Các mục đánh giá tiếp theo giống như trên, chỉ cần lặp lại các div class="item" với nội dung và hình ảnh tương ứng -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc phần Slider Đánh Giá -->
@endsection