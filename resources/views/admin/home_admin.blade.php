@extends('admin.layout_admin')
@section('tieude')
Trang chủ Admin
@endsection
@section('noidungchinh')

      <!-- Content Area -->
      <div class="col-md-10 p-4">
          <!-- Cards -->
          <div class="row mb-4">
            <a href="{{route('donhang.index')}}" class="text-decoration-none col-lg-3 col-md-6 mb-4">
              <div class="card text-white btn-orange">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Đơn Hàng</h5>
                    <p class="card-text">{{$order}} Đơn Hàng</p>
                  </div>
                  <i class="fa-solid fa-truck"></i>
                </div>
              </div>
            </a>
            <a href="{{route('sanpham.index')}}" class="text-decoration-none col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Sản Phẩm</h5>
                    <p class="card-text">{{$product}} Sản Phẩm </p>
                  </div>
                  <i class="fa-brands fa-shopify"></i>
                </div>
              </div>
            </a>
            <a href="{{route('user.index')}}" class="text-decoration-none col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Tài Khoản</h5>
                    <p class="card-text">{{$user_count}} Tài Khoản</p>
                  </div>
                  <i class="fa-solid fa-user-group"></i>
                </div>
              </div>
            </a>
            <a href="{{route('binhluan.index')}}" class="text-decoration-none col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Bình Luận</h5>
                    <p class="card-text">{{$comment}} Bình Luận</p>
                  </div>
                  <i class="fa-solid fa-comments"></i>
                </div>
              </div>
            </a>
          </div>
          <!-- User Statistics Section -->
           
          <div class="container my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                          <div class="revenue-title">Tổng doanh thu tháng này</div>
                            <div class="revenue-value">VND {{$doanhthu_thang_nay}}</div>
                            <div class="revenue-description">Tháng hiện tại</div>          
                                @if ( $doanhthu_thang_nay>$doanhthu_thang_truoc)
                                <div class="percentage-change percentage-up">   
                                <i class="fas fa-arrow-up"></i> 
                                  Tăng {{$ti_le}} so với tháng trước
                                  </div>
                                @else
                                <div class="percentage-change percentage-down">   
                                <i class="fas fa-arrow-down"></i> 
                                  Giảm {{$ti_le}} so với tháng trước
                                </div>
                                @endif
                           
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                          <div class="revenue-title">Tổng doanh thu tháng trước</div>
                          <div class="revenue-value">VND {{$doanhthu_thang_truoc}}</div>
                          <div class="revenue-description">Tháng trước</div>
                          @if ( $doanhthu_thang_truoc>$doanhthu_thang_truoc_nua)
                                <div class="percentage-change percentage-up">   
                                <i class="fas fa-arrow-up"></i> 
                                  Tăng {{$ti_le2}} so với tháng trước
                                  </div>
                                @else
                                <div class="percentage-change percentage-up">   
                                <i class="fas fa-arrow-down"></i> 
                                  Giảm {{$ti_le2}} so với tháng trước
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>

        <div class="chart">
          <canvas id="revenueChart"></canvas>
      </div>
         <hr>
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Sản Phẩm Bán Chạy</h4>
      </div>
      <div class="comment-container" id="commentContainer">
        <div class="comment">
          <div class="row mb-4">
            <div class="container mt-4">
              <div class="card-body">
                <table class="table table-hover table-responsive" id="productTable">
                  <thead class="table-primary">
                    <tr>
                      <th>#</th>
                      <th>Hình ảnh</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Danh Mục</th>
                      <th>Giá</th>
                      <th>Số Lượng</th>
                      <th>Mua Nhiều</th>
                      <th>Chi Tiết</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sanpham as $sp )
                    <tr>
                      <td>1</td>
                      <td><img src="{{$sp->hinh}}" alt="Product Image" class="small-product-img"></td>
                      <td>{{$sp->ten_sp}}</td>
                      <td>{{$sp->loai_go}}</td>
                      <td>{{$sp->giaSale>0?$sp->giaSale:$sp->gia_sp}}</td>
                      <td>{{$sp->soLuong}}</td>
                      <td><span class="badge bg-success">{{$sp->luot_mua}} Lượt Mua</span></td>
                      <td>
                      <a class="btn btn-sm btn-orange btn-view-product" href="{{route('sanpham.show',$sp->id_sp)}}"> Xem</a>

                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var doanhThuLabels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
  var doanhThuData = {!! json_encode($doanhthu_12thang) !!}; 
  var cunrent_year=new Date().getFullYear();

document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: doanhThuLabels,
            datasets: [{
                label: 'Doanh thu năm '+ cunrent_year,
                data: doanhThuData,
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                borderColor: '#28a745',
                borderWidth: 2,
                fill: true  
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

</script>



@endsection