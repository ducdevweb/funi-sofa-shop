<div class="container mt-4">
      <h2>Trang chính</h2>
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="card text-white bg-primary">
            <div class="card-body">
              <h5 class="card-title">Đơn hàng đang giao</h5>
              <p class="card-text">Số lượng: {{ $soLuongDonHangDangGiao }} đơn hàng đang giao.</p>
                <a href="shipper/donhangdanggiao" class="btn btn-light">Xem chi tiết</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-white bg-success">
            <div class="card-body">
              <h5 class="card-title">Đơn hàng đã hoàn thành</h5>
              <p class="card-text">Số lượng: {{ $soLuongDonHangDaGiao }}</p>
              <a href="shipper/donhangdagiao" class="btn btn-light"
                >Xem chi tiết</a
              >
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thống kê hoạt động</h5>
              <p class="card-text">Tổng số đơn: {{$tongsodon}}</p>
              <p class="card-text">Tổng doanh thu dự kiến: {{ number_format($tongtien, 0, ',', '.') }} VNĐ</p></p>
              <p class="card-text">Trạng thái hoạt động: Đang hoạt động</p>
            </div>
          </div>
        </div>
      </div>
    </div>
