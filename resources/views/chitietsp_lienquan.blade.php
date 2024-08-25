<style>
.related-products .card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.related-products .card img {
    width: 100%; /* Chiếm toàn bộ chiều rộng của khung */
    height: 300px; /* Chiều cao cố định cho hình ảnh */
    object-fit: cover; /* Đảm bảo hình ảnh lấp đầy khung mà không bị méo */
}

.related-products .card-body {
    padding: 15px;
}

.related-products .section-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #2f2f2f;
}
</style>

<div class="related-products mt-5">
    <div class="container">
        <h2 class="section-title">Sản phẩm liên quan</h2>
        <div class="row">
            @foreach ($lienquan as $lq)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{$lq->hinh}}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{$lq->ten_sp}}</h5>
                        <p class="card-text">{{$lq->gia_sp}}</p>
                        <a href="/sp/{{$lq->id_sp}}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
</div>
