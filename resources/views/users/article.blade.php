@extends('users.layout')
@section('tieude')
Trang bài viết
@endsection
@section('noidung')
<div class="container mex">

        <div class="sidebar">
            <div class="category">
                <h2>BÀI VIẾT MỚI NHẤT</h2>
                <ul>
                    @foreach ($article_arr as $baiviet)
                    <li><a href="/godatviet/article_ct/{{$baiviet->id_bv}}">{{$baiviet->tieu_de}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    
        <!-- Content -->
    <div class="content">
    <h1>Truyền thông</h1>
    <div class="post-grid">
        @foreach($article_arr as $article)
        <div class="post">
            <img src="{{ asset($article->hinh_bv) }}" alt="Post Image">
            <div class="post-info">
                <h3><a href="/godatviet/article_ct/{{$article->id_bv}}">{{ $article->tieu_de }}</a></h3>
                <p>{{ $article->tac_gia }}</p> 
                <p class="text-muted" style="font-size: 0.85rem;">{{ $article->ngay_dang}}</p>
            </div>
           
        </div>
        @endforeach
    </div>
</div>
    </div>
@endsection