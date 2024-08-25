@extends('layout')

@section('tieude')
Về chúng tôi
@endsection

@section('noidung')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Giới Thiệu Về Chúng Tôi</h1>
                    <p class="mb-4">Chào mừng bạn đến với trang web của chúng tôi! Tại đây, chúng tôi cung cấp những sản phẩm và dịch vụ chất lượng, mang đến cho bạn những trải nghiệm tốt nhất trong việc trang trí và cải thiện không gian sống.</p>
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
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Tại Sao Chọn Chúng Tôi</h2>
                <p>Chúng tôi cam kết mang đến cho bạn sự hài lòng tối đa với dịch vụ và sản phẩm của mình. Từ việc giao hàng nhanh chóng, dễ dàng mua sắm, đến hỗ trợ 24/7 và chính sách đổi trả không phiền hà, chúng tôi luôn đặt lợi ích của bạn lên hàng đầu.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/truck.svg" alt="Giao hàng nhanh" class="img-fluid">
                            </div>
                            <h3>Giao Hàng Nhanh &amp; Miễn Phí</h3>
                            <p>Chúng tôi cung cấp dịch vụ giao hàng nhanh chóng và miễn phí để bạn có thể nhận được sản phẩm yêu thích ngay lập tức.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/bag.svg" alt="Mua sắm dễ dàng" class="img-fluid">
                            </div>
                            <h3>Dễ Dàng Mua Sắm</h3>
                            <p>Quá trình mua sắm trên trang web của chúng tôi rất đơn giản và thuận tiện.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/support.svg" alt="Hỗ trợ 24/7" class="img-fluid">
                            </div>
                            <h3>Hỗ Trợ 24/7</h3>
                            <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn bất cứ khi nào bạn cần, 24/7.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/assets/images/return.svg" alt="Đổi trả dễ dàng" class="img-fluid">
                            </div>
                            <h3>Đổi Trả Dễ Dàng</h3>
                            <p>Chúng tôi cung cấp chính sách đổi trả dễ dàng để bạn có thể mua sắm mà không cần lo lắng.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="/assets/images/why-choose-us-img.jpg" alt="Tại sao chọn chúng tôi" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Đội Ngũ Của Chúng Tôi</h2>
            </div>
        </div>

        <div class="row">
            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="/assets/images/person_1.jpg" class="img-fluid mb-5" alt="Lawson Arnold">
                <h3><a href="#"><span>Lawson</span> Arnold</a></h3>
                <span class="d-block position mb-4">Giám Đốc Điều Hành, Người Sáng Lập</span>
                <p>Chúng tôi sống tách biệt nhưng luôn làm việc cùng nhau để mang đến sự tốt nhất cho khách hàng. Lawson Arnold là người đứng đầu đội ngũ của chúng tôi.</p>
                <p class="mb-0"><a href="#" class="more dark">Tìm Hiểu Thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="/assets/images/person_2.jpg" class="img-fluid mb-5" alt="Jeremy Walker">
                <h3><a href="#"><span>Jeremy</span> Walker</a></h3>
                <span class="d-block position mb-4">Giám Đốc Điều Hành, Người Sáng Lập</span>
                <p>Jeremy Walker là một trong những thành viên quan trọng trong đội ngũ của chúng tôi, đóng góp rất nhiều cho sự phát triển của công ty.</p>
                <p class="mb-0"><a href="#" class="more dark">Tìm Hiểu Thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="/assets/images/person_3.jpg" class="img-fluid mb-5" alt="Patrik White">
                <h3><a href="#"><span>Patrik</span> White</a></h3>
                <span class="d-block position mb-4">Giám Đốc Điều Hành, Người Sáng Lập</span>
                <p>Patrik White là người có nhiều năm kinh nghiệm trong ngành và luôn đem đến những ý tưởng sáng tạo cho đội ngũ của chúng tôi.</p>
                <p class="mb-0"><a href="#" class="more dark">Tìm Hiểu Thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="/assets/images/person_4.jpg" class="img-fluid mb-5" alt="Kathryn Ryan">
                <h3><a href="#"><span>Kathryn</span> Ryan</a></h3>
                <span class="d-block position mb-4">Giám Đốc Điều Hành, Người Sáng Lập</span>
                <p>Kathryn Ryan là người đứng đầu đội ngũ sáng tạo của chúng tôi, luôn nỗ lực để đảm bảo chất lượng và sự hài lòng của khách hàng.</p>
                <p class="mb-0"><a href="#" class="more dark">Tìm Hiểu Thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 4 -->
        </div>
    </div>
</div>
<!-- End Team Section -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Nhận Xét Của Khách Hàng</h2>
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
                                            <p>&ldquo;Dịch vụ của bạn thật tuyệt vời! Tôi rất hài lòng với sản phẩm và cách mà đội ngũ chăm sóc khách hàng của bạn hỗ trợ tôi. Tôi sẽ tiếp tục ủng hộ bạn trong tương lai.&rdquo;</p>
                                        </blockquote>
                                        <div class="d-flex author">
                                            <div class="img-wrap">
                                                <img src="/assets/images/person_1.jpg" alt="Khách hàng">
                                            </div>
                                            <div class="text">
                                                <h3>Nguyễn Văn A</h3>
                                                <p>Khách hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">
                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Tôi rất ấn tượng với chất lượng sản phẩm và sự chuyên nghiệp của đội ngũ nhân viên. Tôi sẽ giới thiệu trang web của bạn cho bạn bè và gia đình.&rdquo;</p>
                                        </blockquote>
                                        <div class="d-flex author">
                                            <div class="img-wrap">
                                                <img src="/assets/images/person_2.jpg" alt="Khách hàng">
                                            </div>
                                            <div class="text">
                                                <h3>Trần Thị B</h3>
                                                <p>Khách hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">
                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Tôi rất hài lòng với sản phẩm và dịch vụ của bạn. Bạn đã vượt qua mong đợi của tôi và tôi cảm thấy thật tuyệt khi mua sắm ở đây.&rdquo;</p>
                                        </blockquote>
                                        <div class="d-flex author">
                                            <div class="img-wrap">
                                                <img src="/assets/images/person_3.jpg" alt="Khách hàng">
                                            </div>
                                            <div class="text">
                                                <h3>Nguyễn Thị C</h3>
                                                <p>Khách hàng</p>
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
    </div>
</div>
<!-- End Testimonial Slider -->

<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Tin Tức &amp; Bài Viết Mới</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="blog-entry">
                    <a href="blog-single.html" class="img-wrap">
                        <img src="/assets/images/blog_1.jpg" class="img-fluid" alt="Bài viết 1">
                    </a>
                    <div class="text">
                        <h3><a href="blog-single.html">Khám Phá Những Xu Hướng Mới Trong Trang Trí Nội Thất</a></h3>
                        <p>Khám phá những xu hướng mới nhất trong trang trí nội thất và làm thế nào để áp dụng chúng vào không gian sống của bạn.</p>
                        <p><a href="blog-single.html" class="more dark">Đọc Thêm <span class="icon-arrow_forward"></span></a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="blog-entry">
                    <a href="blog-single.html" class="img-wrap">
                        <img src="/assets/images/blog_2.jpg" class="img-fluid" alt="Bài viết 2">
                    </a>
                    <div class="text">
                        <h3><a href="blog-single.html">Hướng Dẫn Chọn Mua Đồ Nội Thất Phù Hợp Với Phong Cách Của Bạn</a></h3>
                        <p>Tìm hiểu cách chọn mua đồ nội thất phù hợp với phong cách cá nhân của bạn và tạo nên không gian sống ấn tượng.</p>
                        <p><a href="blog-single.html" class="more dark">Đọc Thêm <span class="icon-arrow_forward"></span></a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="blog-entry">
                    <a href="blog-single.html" class="img-wrap">
                        <img src="/assets/images/blog_3.jpg" class="img-fluid" alt="Bài viết 3">
                    </a>
                    <div class="text">
                        <h3><a href="blog-single.html">Cách Bảo Dưỡng Đồ Nội Thất Để Đảm Bảo Tuổi Thọ</a></h3>
                        <p>Học cách bảo dưỡng đồ nội thất của bạn để đảm bảo chúng luôn giữ được vẻ đẹp và độ bền theo thời gian.</p>
                        <p><a href="blog-single.html" class="more dark">Đọc Thêm <span class="icon-arrow_forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection