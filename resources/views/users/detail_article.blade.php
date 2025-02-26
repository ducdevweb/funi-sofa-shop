@extends('users.layout')

@section('tieude')
Trang chi tiết bài viết
@endsection

@section('noidung')
<div class="container max">
    <div class="row">
        <div class="col-md-4 sidebar">
            <div class="category">
                <h2>BÀI VIẾT MỚI NHẤT</h2>
                <ul class="list-group">
                    @foreach ($article_arr as $baiviet)
                    <li class="list-group-item">
                        <a href="{{ url('chitietbaiviet', $baiviet->id_bv) }}">{{ $baiviet->tieu_de }}</a><br>
                        <span class="meta">{{ $baiviet->tac_gia }} - {{ \Carbon\Carbon::parse($baiviet->ngay_dang)->format('d.m.Y') }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-8 content">
            @if ($article_ct)
            <h2>Tìm hiểu về {{ $article_ct->tieu_de }}</h2>
            <img src="{{ asset($article_ct->hinh_bv) }}" alt="Post Image" class="img-fluid mb-3" style="    max-width: 100%;height: 40%;">
          
            <p>{{ $article_ct->noi_dung }}</p>
        
            <div class="meta text-right mt-4">
                <span>Media - Đăng ngày {{ \Carbon\Carbon::parse($article_ct->ngay_dang)->format('d.m.Y') }}</span>
            </div>
        
            @else
            <p>Bài viết không tồn tại.</p>
            @endif
        </div>
    </div>
</div> 
@endsection
