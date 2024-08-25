<!-- Bình luận Section -->
<div class="comment-section mt-5">
    <div class="container">
        <h2 class="section-title">Bình luận</h2>
        <form class="comment-form" action="/savecoment" method="POST">
          @csrf
            <div class="form-group">
                <label for="comment">Bình luận</label>
                <textarea class="form-control" name="noidung" id="comment" rows="4" placeholder="Nhập bình luận của bạn"></textarea>
            </div>
            <input type="hidden" name="id_sp" value="{{$sp->id_sp}}">
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
    </div>
</div>
<!-- Hiển thị bình luận -->
<div class="comments-list mt-4">
    <div class="container">
        <h2 class="section-title">Danh sách bình luận</h2>
        <ul class="list-unstyled">
            <!-- Bình luận 1 -->
            <li class="comment-item mb-3">
                <div class="card">
                @if ($binhluan->isEmpty())
                        <p>Chưa có bình luận nào</p>
                    @else
                        @foreach ($binhluan as $bl)
                            <div class="card-body">
                                <p class="card-text">{{$bl->ten_nd}}:{{$bl->noiDung}}.</p>
                                <footer class="blockquote-footer tex    t-end">
                                    Bình luận vào <cite title="Source Title">{{ \Carbon\Carbon::parse($bl->ngayDang)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</cite>
                                    @if(Auth::user()->id == $bl->id_nd)
                                        <td>
                                            <a href="/delete_cmt/{{$bl->id_bl}}" class=" btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</a>
                                        </td>
                                    @endif
                                </footer>
                            
                            </div>
                        @endforeach
                    @endif

                </div>
                       
            </li>

        </ul>
    </div>
</div>
