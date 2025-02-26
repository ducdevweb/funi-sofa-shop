<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Selection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assetss/css/voucher2.css">
    <link rel="stylesheet" href="/assetss/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assetss/css/dropdown.css">
    <style>
        .voucher-card { border: 1px solid #ccc; border-radius: 5px; padding: 20px; margin-bottom: 20px; }
        .voucher-apply { display: flex; align-items: center; justify-content: flex-end; }
        .voucher-radio { margin-left: 10px; }
    </style>
</head>

<body>
    <form method="post" action="/godatviet/apply" class="container mt-5">
        @csrf
        <h1 class="text-center mb-4">Chọn Voucher</h1>

        <div class="row">
            <!-- Voucher của bạn bên trái -->
            <div class="col-md-6">
                <h2 class="text-center mb-5">Voucher của bạn</h2>
                <div class="row">
                    @foreach ($voucher_1 as $voucher)
                        <div class="col-md-12">
                            <div class="voucher-card">
                                <div class="voucher-logo">{{ $voucher->ma_giam_gia }}</div>
                                <div class="voucher-info">
                                    <h5>Giảm {{ $voucher->so_tien_giam }}</h5>
                                    <p>Mã Voucher: {{ $voucher->ma_giam_gia }}</p>
                                    <p>Đơn Tối Thiểu: {{ $voucher->gioi_han_su_dung }}</p>
                                    <p>Hiệu lực: {{ $voucher->ngay_bat_dau }} - {{ $voucher->ngay_het_han }}</p>
                                </div>
                                <div class="voucher-apply">
                                    <input type="radio" class="voucher-radio" id="voucher{{$loop->index}}" name="your_voucher" value="{{ $voucher->so_tien_giam }}">
                                </div>  
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="text-center mb-5">Voucher dành cho thành viên</h2>
                <div class="row">
                    @if (Auth::check())
                    @foreach ($voucher_2 as $voucher)
                        <div class="col-md-12">
                            <div class="voucher-card">
                                <div class="voucher-logo">{{ $voucher->ma_giam_gia }}</div>
                                <div class="voucher-info">
                                    <h5>Giảm {{ $voucher->so_tien_giam }}</h5>
                                    <p>Mã Voucher: {{ $voucher->ma_giam_gia }}</p>
                                    <p>Đơn Tối Thiểu: {{ $voucher->gioi_han_su_dung }}</p>
                                    <p>Hiệu lực: {{ $voucher->ngay_bat_dau }} - {{ $voucher->ngay_het_han }}</p>
                                </div>
                                <div class="voucher-apply">
                                    <input type="radio" class="voucher-radio" id="voucher{{$loop->index}}" name="member_voucher" value="{{ $voucher->so_tien_giam }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <a href="/godatviet/login" class="btn btn-warning btn-lg text-white font-weight-bold">Đăng nhập để được hưởng quyền lợi</a>    
                     @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
        <button id="apply-voucher-button" type="submit" class="btn btn-success">Áp dụng voucher này</button>
    </div>
    </form>


    <script>
        const applyButton = document.getElementById('apply-voucher-button');

        const updateApplyButtonVisibility = () => {
            const yourVoucherSelected = document.querySelector('input[name="your_voucher"]:checked');
            const memberVoucherSelected = document.querySelector('input[name="member_voucher"]:checked');

            // Hiển thị nút nếu có ít nhất một voucher được chọn
            if (yourVoucherSelected || memberVoucherSelected) {
                applyButton.style.display = 'block';
            } else {
                applyButton.style.display = 'none';
            }
        };

        // Thêm sự kiện lắng nghe cho tất cả các voucher
        document.querySelectorAll('input[name="your_voucher"]').forEach(voucher => {
            voucher.addEventListener('change', updateApplyButtonVisibility);
        });

        document.querySelectorAll('input[name="member_voucher"]').forEach(voucher => {
            voucher.addEventListener('change', updateApplyButtonVisibility);
        });

        // Khởi tạo trạng thái nút
        updateApplyButtonVisibility();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
