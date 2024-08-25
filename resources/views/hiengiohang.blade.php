@extends('layout')
@section('tieude')
Giỏ hàng
@endsection

@section('noidung')
<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                @csrf
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                               
                                <th class="product-thumbnail">Hình ảnh</th>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng cộng</th>
                                <th class="product-remove">Xóa</th>
                               
                              
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cart) && count($cart) > 0)
                                @foreach ($cart as $item =>$sp)
                                @if (isset($id_nd)&&$id_nd!=0)
                                    <tr>
                                        <h3 hidden>{{$sp['id_sp']}}</h3>
                                        <h3 hidden>{{$id_nd}}</h3>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{$sp['hinh']}}" alt="Hình ảnh" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $sp['ten_sp'] }}</h2>
                                        </td>
                                        <td>
                                            @if ($sp['giaSale'] > 1)
                                                {{ number_format($sp['giaSale'], 0, ',', '.') }}
                                            @else
                                                {{ number_format($sp['gia_sp'], 0, ',', '.') }}
                                            @endif
                                        </td>
                                        <td>
                                    <form action="cart/decrease" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $sp['id_sp'] }}">
                                    <input type="hidden" name="action" value="decrease">
                                    <button class="btn btn-outline-black" type="submit">&minus;</button>
                                </form>
                                <input type="text" class="form-control text-center quantity-amount" value="{{ $sp['soluong']}}" readonly>
                                <form action="cart/increase" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $sp['id_sp'] }}">
                                    <input type="hidden" name="action" value="increase">
                                    <button class="btn btn-outline-black" type="submit">&plus;</button>
                                </form>

                                        </td>
                                        <td>{{ number_format($sp['thanhtien'], 0, ',', '.') }}</td>
                                        <td><a href="/del_cart/{{ $sp['id_sp'] }}" class="btn btn-black btn-sm">X</a></td>
                                    </tr>
                                                            
                                @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">Không có sản phẩm nào được chọn</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                   
                    <div class="col-md-6">
                        <form action="/shop">
                        <button class="btn btn-outline-black btn-sm btn-block">Tiếp tục mua sắm</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Mã giảm giá</label>
                        <p>Nhập mã giảm giá của bạn nếu có.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Mã giảm giá">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-black">Áp dụng mã giảm giá</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Tổng giỏ hàng</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Tạm tính</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ number_format($tongtien, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Tổng cộng</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ number_format($tongtien, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='/check_out'">Tiến hành thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
