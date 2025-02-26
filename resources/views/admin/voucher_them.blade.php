@extends('admin.layout_admin')

@section('tieude')
Thêm mã giảm giá
@endsection

@section('noidungchinh')

  
<form class="col-md-10" action="{{ route('vouchers.store') }}" method="POST">
  @csrf
  <div class="comment">
    <div class="row mb-4">
      <div class="container mt-4">
        <div class="card shadow" style="border-radius: 10px;">
          <div class="card-header text-white" style="background-color: #ffcc00; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h4 class="font-weight-bold mb-0">Thêm voucher</h4>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="ma_giam_gia" class="form-label">Mã Voucher</label>
              <input type="text" name="ma_giam_gia" class="form-control" id="ma_giam_gia" required>
            </div>
            <div class="mb-3">
              <label for="so_tien_giam" class="form-label">Giá</label>
              <input type="text" name="so_tien_giam" class="form-control" id="so_tien_giam" required>
            </div>
            <div class="mb-3">
              <label for="gioi_han_su_dung" class="form-label">Giới Hạn Sử Dụng</label>
              <input type="number" name="gioi_han_su_dung" class="form-control" id="gioi_han_su_dung" required>
            </div>
            <div class="mb-3">
              <label for="ngay_bat_dau" class="form-label">Ngày Bắt Đầu</label>
              <input type="date" name="ngay_bat_dau" class="form-control" id="ngay_bat_dau" required>
            </div>
            <div class="mb-3">
              <label for="ngay_het_han" class="form-label">Ngày Kết Thúc</label>
              <input type="date" name="ngay_het_han" class="form-control" id="ngay_het_han" required>
            </div>
            <div class="mb-3">
              <label for="anhien" class="form-label">Trạng Thái Mã</label>
                <select name="an_hien" >
                    <option value="1">Kích Hoạt Mã</option>
                    <option value="0">Vô Hiệu Hóa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Voucher</button>
            <a href="{{ route('vouchers.index') }}" class="btn btn-secondary">Hủy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
