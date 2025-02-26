@component('mail::message')
# Xác nhận đơn hàng #{{ $donhang->maDon }}

Cảm ơn bạn đã đặt hàng tại **Gỗ Đất Việt**. Dưới đây là thông tin chi tiết về đơn hàng của bạn:

## Thông Tin Khách Hàng
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td><strong>Tên khách hàng:</strong></td>
        <td>{{ $donhang->tenNguoiNhan }}</td>
    </tr>
    <tr>
        <td><strong>Số điện thoại:</strong></td>
        <td>{{ $donhang->soDienThoai }}</td>
    </tr>
    <tr>
        <td><strong>Địa chỉ nhận hàng:</strong></td>
        <td>{{ $donhang->diaChi }}</td>
    </tr>
    <tr>
        <td><strong>Ghi chú:</strong></td>
        <td>{{ $donhang->ghiChu ?? 'Không có ghi chú' }}</td>
    </tr>
</table>

## Thông Tin Đơn Hàng
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td><strong>Ngày đặt hàng:</strong></td>
        <td>{{ $donhang->ngayMua }}</td>
    </tr>
    <tr>
        <td><strong>Trạng thái đơn hàng:</strong></td>
        <td>
            @if($donhang->trangThai == 0)
                Chưa nhận hàng
            @else
                Đã nhận hàng
            @endif
        </td>
    </tr>
    <tr>
        <td><strong>Trạng thái thanh toán:</strong></td>
        <td>
            @if($donhang->thanhToan == 0)
                Chưa thanh toán
            @else
                Đã thanh toán
            @endif
        </td>
    </tr>
    <tr>
        <td><strong>- **Hình thức thanh toán:**</strong></td>
        <td>
            @if($donhang->hinhThanhToan == 0)
            !Thanh toán qua VNPAY
            @else
            -  Thanh toán tiền mặt ( COD )
            @endif
        </td>
    </tr>
</table>

@if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $donhang->hinhThanhToan== 0))
- **Hình thức thanh toán:**
!Thanh toán qua thẻ ngân hàng
@else
- **Hình thức thanh toán:** Thanh toán tiền mặt
@endif

## Danh Sách Sản Phẩm
<table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="padding: 8px; border: 1px solid #ddd;">Tên sản phẩm</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Hình ảnh</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Số lượng</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Giá</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderDetails as $product)
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $product->ten_sp }}</td>
            <td style="padding: 8px; border: 1px solid #ddd;">
            <img src="{{ url('assets/images/' . $product->hinh) }}" alt="{{ $product->ten_sp }}" style="width: 100px; height: auto;">
            </td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $product->soLuong }}</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ number_format($product->gia_sp, 0, ',', '.') }} VND</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ number_format($product->soLuong * $product->gia_sp, 0, ',', '.') }} VND</td>
        </tr>
        @endforeach
    </tbody>
</table>

### Tổng cộng: **{{ number_format($tongTien, 0, ',', '.') }} VND**

Cảm ơn bạn đã mua hàng tại **Gỗ Đất Việt**!

@lang('Regards'),
**{{ config('app.name') }}**
@endcomponent
