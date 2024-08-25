<head>
    <style>
        .comment-section {
            background: #f9f9f9;
            padding: 40px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .star-rating {
            display: flex;
            font-size: 2.5em;
            color: #ccc;
            margin-top: 10px;
            padding: 0;
            border: none;
            background: none;
            direction: rtl; 
            justify-content: right; 
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
        }

        .star-rating input:checked ~ label,
        .star-rating input:hover ~ label,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }

        .rating-summary {
            font-size: 1.4em;
            color: #333;
            margin-top: 10px;
        }

        .rating-summary span {
            font-weight: bold;
        }

        .rating-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align content to the left */
            margin-top: 10px;
        }

        .rating-container button.btn-primary {
            margin-top: 10px;
        }

        .sao {
            font-size: 1.4em;
        }

        .danhgia {
            margin-top: 20px; 
            text-align: left; /* Align text to the left */
        }
    </style>
</head>

<body>
    <div class="container product-detail-section">
        <div class="row">
            <div class="col-lg-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{$sp->hinh}}" class="d-block w-100" alt="Product Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{$sp->hinh}}" class="d-block w-100" alt="Product Image 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Quay lại</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Tiếp theo</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="product-title">{{$sp->ten_sp}}</h1>
                <p class="product-description">{{$sp->moTa}}</p>
                <p class="product-price">{{$sp->gia_sp}}</p>
                <div class="product-cta">
                    <a href="/addCart/{{$sp->id_sp}}" class="btn btn-primary">Thêm vào giỏ hàng</a>
                    <button class="btn btn-secondary">Mua ngay</button>
                </div>
                <div class="product-meta mt-4">
                    <h4>Chất liệu</h4>
                    <ul class="list-unstyled">
                        <li><strong>Chất liệu:</strong> {{$sp->loai_go}}</li>
                        <li><strong>Kích thước:</strong> {{$sp->kich_thuoc}} cm</li>
                        <li><strong>Màu sắc:</strong> {{$sp->mau_sac}}</li>
                        <li><strong>Bảo hành:</strong> {{$sp->bao_hanh}} năm</li>
                    </ul>
                    <div class="rating-summary">
                        <span>Đánh giá trung bình:</span> 
                        @if ($danhgia->isEmpty())
                            Chưa có đánh giá
                        @else
                        @if ($Tb_sao)
                        {{ number_format($Tb_sao, 1) }} / 5
                        @endif
                        @endif
                    </div>

                    <div class="danhgia">
                        <form action="/rating/{{$sp->id_sp}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_sp" value="{{ $sp->id_sp }}">
                            <div class="rating-container">
                                <label for="rating">Đánh giá:</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="" disabled selected>Chọn đánh giá</option>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }} sao</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary mt-3">Gửi đánh giá</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>
