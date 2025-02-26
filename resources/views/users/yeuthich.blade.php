@extends('users.layout')
  @section('tieude')
  Trang chi tiết sản phẩm
  @endsection
  @section('noidung')

  <div class="row">
    @foreach (session('yeuThich', []) as $sanpham)
    <div class="col-lg-4 col-md-6">
        <div class="item">
            <a href="/godatviet/shop/{{$sanpham['id_sp']}}">
                <img src="{{$sanpham['hinh']}}" alt="Sofa" style="height: 300px;">
                <span class="discount-label">Yêu thích</span>
            </a>
            <!-- Hiển thị danh mục của sản phẩm -->
            <span class="category">{{ $sanpham['danhmuc'] ?? 'Chưa có danh mục' }}</span> <br>

            <h4><a href="/godatviet/shop/{{$sanpham['id_sp']}}">{{$sanpham['ten_sp']}}</a></h4>

            <!-- Hiển thị giá sản phẩm -->
            <h6 class="price">{{ $sanpham['giaSale'] > 0 ? $sanpham['giaSale'] : $sanpham['gia_sp'] }}
                <span class="original-price">{{ $sanpham['giaSale'] > 0 ? $sanpham['gia_sp'] : "" }}</span>
            </h6> <br>

            <!-- Hiển thị đánh giá sao -->
            <ul>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                <span style="color: #f35525;">
                    @php
                        // Tính toán đánh giá sao
                        $total_star = $sanpham['danhgia'] * 5;  // Giả sử bạn đã có giá trị đánh giá trung bình
                        $count_star = 5; // Giả sử 5 sao là mức tối đa
                        $star = $count_star > 0 ? $total_star / $count_star : 0;
                    @endphp

                    <!-- Hiển thị sao đầy đủ -->
                    @for ($i = 1; $i <= floor($star); $i++)
                        <i class="fas fa-star"></i>
                    @endfor

                    <!-- Hiển thị sao nửa -->
                    @if ($star - floor($star) >= 0.5)
                        <i class="fas fa-star-half-alt"></i>
                    @endif

                    <span class="sold">Đã bán: ({{$sanpham['luot_mua']}})</span>
                </span> <br>
            </ul>

            <!-- Nút Xóa yêu thích -->
            <a href="{{ route('users.xoayeuthich', ['id_sp' => $sanpham['id_sp']]) }}" class="btn btn-danger">Xóa yêu thích</a>
        </div>
    </div>
    @endforeach
</div>




@endsection
