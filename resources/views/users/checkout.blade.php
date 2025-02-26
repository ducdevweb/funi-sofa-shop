@extends('users.layout')

@section('noidung')
<form method="post" action="/godatviet/complete_checkout">
    @csrf
    <section class="featured section">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">Thông Tin Đặt Hàng</h2>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Thông Tin Giao Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên đầy đủ</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người nhận" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ nhận hàng" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại nhận hàng" required>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea class="form-control" name="note" id="note" rows="3" placeholder="Nhập ghi chú hoặc yêu cầu đặc biệt (nếu có)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Phương Thức Thanh Toán</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Chọn phương thức thanh toán</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="paymentMethod" type="radio" id="cod" value="cod" checked>
                                    <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard">
                                    <label class="form-check-label" for="creditCard">Thẻ tín dụng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tổng Quan Đơn Hàng</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @if (isset($check_out) && count($check_out) > 0)
                                    @foreach ($check_out as $index => $ck)
                                        <li class="menu d-flex justify-content-between">
                                            <img class="imgcheck" src="{{ $ck['hinh'] }}" alt="{{ $ck['ten_sp'] }}">
                                            <span>{{ $ck['ten_sp'] }}</span>
                                            <span>{{ $ck['gia_sp'] }} x {{ $ck['soluong'] }}</span>
                                            <input type="hidden" name="items[{{ $index }}][ten_sp]" value="{{ $ck['ten_sp'] }}">
                                            <input type="hidden" name="items[{{ $index }}][hinh]" value="{{ $ck['hinh'] }}">
                                            <input type="hidden" name="items[{{ $index }}][gia_sp]" value="{{ $ck['gia_sp'] }}">
                                            <input type="hidden" name="items[{{ $index }}][giaSale]" value="{{ $ck['giaSale'] }}">
                                            <input type="hidden" name="items[{{ $index }}][soluong]" value="{{ $ck['soluong'] }}">
                                            <input type="hidden" name="items[{{ $index }}][thanhtien]" value="{{ $ck['thanhtien'] }}">
                                            <input type="hidden" name="items[{{ $index }}][id_sp]" value="{{ $ck['id_sp'] }}">
                                        </li>
                                    @endforeach
                                @else
                                    <p>Bạn chưa có sản phẩm nào</p>
                                @endif
                                <li class="d-flex justify-content-between mt-2">
                                    <h5>Tổng cộng</h5>
                                    <h5>{{ $tongtien }}</h5>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary w-100">Xác Nhận Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleCreditCardInfo() {
            var creditCardInfo = document.getElementById('creditCardInfo');
            var creditCard = document.getElementById('creditCard');
            if (creditCard.checked) {
                creditCardInfo.style.display = 'block';
            } else {
                creditCardInfo.style.display = 'none';
            }
        }
        toggleCreditCardInfo();
        document.querySelectorAll('input[name="paymentMethod"]').forEach(function(method) {
            method.addEventListener('change', toggleCreditCardInfo);
        });
    });
</script>
@endsection
