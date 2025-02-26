@extends('users.layout')

@section('tieude')
Trang giỏ hàng
@endsection

@section('noidung')
<section class="container mt-5">
    <h2 class="mb-4">Có <span class="fw-bold">@if(session()->has('tongsoluong')) {{ session('tongsoluong') }} 
     @else 
        0
    @endif
     sản phẩm </span> trong giỏ hàng</h2>
    <div class="row">
       @forelse ($cart as $c)
        <div class="col-lg-8 col-md-12">
            <div class="cart-item d-flex align-items-center border-bottom py-3">
                <div class="product-info d-flex align-items-center" style="flex: 2;">
                    <img src="{{$c['hinh']}}" class="img-fluid" style="width: 100px;" alt="Sản phẩm">
                    <div class="ms-3">
                        <h5>{{$c['ten_sp']}}</h5>
                        @if ($c['giaSale'] > 0)
                        <p class="text-muted"><del>{{number_format($c['gia_sp'], 0, ',', '.')}}</del> <span class="fw-bold mt-5" style="color: #e74c3c;">{{number_format($c['giaSale'], 0, ',', '.')}}</span></p>
                        @else
                        <p class="text-muted"><span class="fw-bold mt-5" style="color: #e74c3c;">{{number_format($c['gia_sp'], 0, ',', '.')}}</span></p>  
                        @endif
                    </div>
                </div>
                <div class="quantity-control d-flex mx-5" style="flex: 1;">
                    <a href="/godatviet/cart/down/{{$c['id_sp']}}" class="btn btn-outline-secondary btn-minus"><i class="fa fa-minus"></i></a>
                    <input type="text" class="form-control quantity-input text-center mx-2" value="{{$c['soluong']}}" min="1">
                    <a href="/godatviet/cart/up/{{$c['id_sp']}}"  class="btn btn-outline-secondary btn-plus"><i class="fa fa-plus"></i></a>
                </div>
                <div class="product-total fw-bold" style="flex: 1; color: #333;">
                    <span class="total-label">Thành tiền:</span> <span id="total-amount">{{number_format($c['thanhtien'], 0, ',', '.')}} VNĐ</span>
                </div>
                <form action="">
                <a href="/godatviet/del_cart/{{$c['id_sp']}}" class="btn btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                </form>
            </div>
        </div>
           @empty
               <div class="col-lg-8 col-md-12">Chưa có sản phẩm trong giỏ hàng</div>
           @endforelse
           
        <!-- Phần tổng cộng và voucher -->
        <div class="col-lg-4 col-md-12">
            <div class="border p-3 bg-light">
                <h4>Mã giảm giá</h4>
                <form id="voucher-form" class="d-flex justify-content-between mb-3" method="POST" action="/godatviet/apply-voucher">
                    @csrf
                    <input type="text" class="form-control me-2" id="voucher-input" name="voucher_code" placeholder="Nhập mã giảm giá" required>
                    <button type="submit" class="btn btn-primary">Áp dụng</button>
                </form>

                <a href="/godatviet/voucher" class="btn btn-success w-100 mt-3">Chọn từ kho voucher</a>

                <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                        <span>Tạm tính:</span>
                        <span id="subtotal">{{ number_format($sum_discount > 0 ? $tongtien + $sum_discount : $tongtien, 0, ',', '.') }} VNĐ</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Số tiền giảm:</span>
                        <span id="subtotal">{{ number_format($sum_discount > 0 ? $sum_discount : 0, 0, ',', '.') }} VNĐ</span>
                    </li>
                    <li class="d-flex justify-content-between fw-bold">
                        <span>Tổng cộng:</span>
                        <span id="total" style="font-size: 1.2em;">{{ number_format($tongtien, 0, ',', '.') }} VNĐ</span>
                    </li>
                </ul>
                <a href="/godatviet/checkout" class="btn btn-success w-100 mt-3">Thanh toán</a>
            </div>
        </div>
    </div>
</section>
@endsection
