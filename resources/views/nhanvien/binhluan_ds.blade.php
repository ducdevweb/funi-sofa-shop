@extends('nhanvien.layout_nhanvien')

@section('tieude')
    Quản lý bình luận
@endsection

@section('noidungchinh')
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
                        <button type="submit" class="btn btn-light">Xem Bình Luận</button>
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
                        <button type="submit" class="btn btn-light">Xem Bình Luận</button>
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
                                <p class="card-text">{{ $comment_not_answered}} Bình luận</p>
                            </div>
                            <i class="bi bi-box-seam fs-1"></i>
                        </div>
                        <button type="submit" class="btn btn-light">Xem Bình Luận</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <form action="{{ route('binhluan_nv.show',0) }}" method="GET">
                    @csrf
               
                    <div class="card text-white bg-warning">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Lượt đánh giá</h5>
                                <p class="card-text">{{ $comment_assess}} Bình luận</p>
                            </div>
                            <i class="bi bi-star fs-1"></i>
                        </div>
                        <button type="submit" class="btn btn-light">Xem Bình Luận</button>
                    </div>
                </form>
            </div>
        </div>
   
        <form action="{{route('binhluan.index')}}" method="GET" class="row mb-4 align-items-end">
        <div class="col-lg-4">
            <label for="ngay_from" class="form-label">Chọn Ngày Bắt Đầu:</label>
            <input type="date" name="ngay_from" class="form-control" id="ngay_from" value="{{ request('ngay_from') }}" required>
        </div>
        <div class="col-lg-4">
            <label for="ngay_to" class="form-label">Chọn Ngày Kết Thúc:</label>
            <input type="date" name="ngay_to" class="form-control" id="ngay_to" value="{{ request('ngay_to') }}" required>
        </div>
        <div class="col-lg-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Xem</button>
        </div>
    </form>


<div class="comment-container">
    @if (count($binhluan_arr)>0)
    @foreach($binhluan_arr as $binhluan)
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
        @else
      
        <div class="text-center align-items-center justify-between">Không có bình luận phù hợp</div> 
        
        @endif
</div>

<script>
    function toggleReplyForm(formId) {
        const form = document.getElementById(formId);
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block'; 
        } else {
            form.style.display = 'none'; 
        }
    }
  
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa bình luận này?");
    }

</script>

@endsection
