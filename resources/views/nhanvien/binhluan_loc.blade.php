@extends('nhanvien.layout_nhanvien')

@section('tieude')
    Quản lý bình luận
@endsection

@section('noidungchinh')
<style>
    .btn-star {
        background-color: #f0f0f5; 
        color: #333; 
        
        border-radius: 15px; 
        padding: 10px 15px; 
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease; 
        width: 100%;
    }

    .btn-star:hover {
        background-color: #e0e0eb; 
        cursor: pointer;
    }

    .btn-star i {
        margin-left: 5px;
        color: #ffcc00; 
    }


    .list-group-item {
        padding: 15px; 
        border: 1px solid #ddd;
        border-radius: 10px; 
        margin-bottom: 10px; 
    }
</style>

<div class="col-md-10 p-4">
    <div class="row mb-4">
        <!-- Tổng Bình Luận -->
        <div class="col-lg-3 col-md-6 mb-4">
            <form action="{{ route('binhluan_nv.index') }}" method="GET">
                @csrf
                <input type="hidden" name="filter" value="all">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Tổng Bình Luận</h5>
                            <p class="card-text">{{ $comment }} Bình luận</p>
                        </div>
                        <i class="bi bi-bag-check fs-1"></i>
                    </div>
                    <button type="submit" class="btn btn-light w-100">Xem Bình Luận</button>
                </div>
            </form>
        </div>

        <!-- Bình luận đã trả lời -->
        <div class="col-lg-3 col-md-6 mb-4">
            <form action="{{ route('binhluan_nv.index') }}" method="GET">
                @csrf
                <input type="hidden" name="filter" value="replied">
                <div class="card text-white bg-danger">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Đã Trả Lời</h5>
                            <p class="card-text">{{ $comment_rep }} Bình luận</p>
                        </div>
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                    <button type="submit" class="btn btn-light w-100">Xem Bình Luận</button>
                </div>
            </form>
        </div>

        <!-- Bình luận chưa trả lời -->
        <div class="col-lg-3 col-md-6 mb-4">
            <form action="{{ route('binhluan_nv.index') }}" method="GET">
                @csrf
                <input type="hidden" name="filter" value="unreplied">
                <div class="card text-white bg-info">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Chưa trả lời</h5>
                            <p class="card-text">{{ $comment_not_answered }} Bình luận</p>
                        </div>
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                    <button type="submit" class="btn btn-light w-100">Xem Bình Luận</button>
                </div>
            </form>
        </div>

        <!-- Lượt đánh giá -->
        <div class="col-lg-3 col-md-6 mb-4">
            <form action="{{ route('binhluan_nv.show', 0) }}" method="GET">
                @csrf
                <div class="card text-white bg-warning">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Lượt đánh giá</h5>
                            <p class="card-text">{{ $comment_assess }} Bình luận</p>
                        </div>
                        <i class="bi bi-star fs-1"></i>
                    </div>
                    <button type="submit" class="btn btn-light w-100">Xem Bình Luận</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-4">
        @for ($star = 1; $star <= 5; $star++)
            <div class="col-lg-2 col-md-4 d-flex align-items-end mb-3">
                <a href="{{ route('binhluan_nv.show', $star) }}" class="btn-star">
                    <span>{{ $star }}</span> <i class="fa-solid fa-star"></i> ({{$count_star[$star]}} Đánh Giá)
                </a>
            </div>
        @endfor
    </div>

    <div class="comment-container">
        @foreach($binhluans as $binhluan)
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-1 d-flex align-items-center">
                    <img src="/assets_ad/images/ban2.jpg" class="img-comment" alt="Avatar">
                </div>
                <div class="col-md-9">
                    <div class="comment-header">
                        <h5>{{ $binhluan->ten_nd }} <span class="text-muted">đã bình luận:</span></h5>
                    </div>
                    <div class="comment-text">
                        <p>{{ $binhluan->noiDung }}</p>
                    </div>
                    <div class="product-info">
                        <div>
                            <p><strong>Sản phẩm:</strong> Sản phẩm {{ $binhluan->id_sp }}</p>
                            <p class="star-rating"><strong>Đánh giá:</strong> 
                                {{ str_repeat('★', $binhluan->danhgia) }}
                                {{ str_repeat('☆', 5 - $binhluan->danhgia) }}
                            </p>
                        </div>
                        <div class="btn-group">
                            <form action="{{ route('binhluan_nv.destroy', $binhluan->id_bl) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                            <button class="btn btn-success btn-sm" onclick="toggleReplyForm('replyForm{{ $binhluan->id_bl }}')">Trả lời</button>
                        </div>
                    </div>

                    <!-- Form trả lời -->
                    <div id="replyForm{{ $binhluan->id_bl }}" class="reply-form" style="display: none;">
                        <form method="post" action="{{ route('binhluan_nv.store') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="number" hidden name="id_bl" value="{{ $binhluan->id_bl }}">
                                <label for="replyText{{ $binhluan->id_bl }}" class="form-label">Trả lời bình luận</label>
                                <textarea class="form-control" name="phanhoi" id="replyText{{ $binhluan->id_bl }}" rows="3" placeholder="Viết trả lời..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Gửi</button>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="toggleReplyForm('replyForm{{ $binhluan->id_bl }}')">Hủy</button>
                        </form>
                    </div>

                    <div class="replies mt-2">
                        @foreach($binhluan->phanhois as $phanhoi)
                            <div class="reply">
                                <h6>{{ $phanhoi->ten_nd }} <span class="text-muted">đã phản hồi:</span></h6>
                                <p>{{ $phanhoi->phanhoi }}</p>
                                <small>{{ $phanhoi->ngayDang }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function toggleReplyForm(id) {
            const form = document.getElementById(id);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa bình luận này không?');
        }
    </script>
</div>
@endsection
