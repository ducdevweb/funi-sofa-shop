<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Báo Cáo Doanh Thu</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Báo Cáo Doanh Thu</h1>
    <p><strong>Thời gian:</strong> {{ $ngay_from ?? 'Không giới hạn' }} - {{ $ngay_to ?? 'Không giới hạn' }}</p>

    <table>
        <thead>
            <tr>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng Bán</th>
                <th>Đơn Giá</th>
                <th>Giá Cuối Cùng</th>
                <th>Doanh Thu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doanhthu as $item)
                <tr>
                    <td>
                    <img src="http://127.0.0.1:8000/assets/images/{{ $item->hinh }}" alt="{{ $item->ten_sp }}" width="50" />
                    </td>
                    <td>{{ $item->ten_sp }}</td>
                    <td>{{ number_format($item->soLuong, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->gia_sp, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item->final_price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item->soLuong * $item->final_price, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="text-align: right;">Tổng Doanh Thu: {{ number_format($tongdoanhthu, 0, ',', '.') }} VNĐ</h3>
</body>
</html>
