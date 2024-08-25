@extends('layout');
@section('tieude')
Đơn hàng chi tiết
@endsection
@section('noidung')
<div class="container mt-5">
    <h1 class="mb-4">Chi tiết đơn hàng</h1>

    <!-- Danh sách sản phẩm -->
    <div class="card">
        <div class="card-header" style="background-color: #28a745; color: white;">
            <h5 class="mb-0">Danh sách sản phẩm</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_od as $ct)
                
                    <tr>
                        <td>{{$ct->ten_sp}}</td>
                        
                        <td><img src="{{$ct->hinh}}" alt="" width="200" height="100"></td>
                        <td>{{$ct->soLuong}}</td>
                        <td>{{number_format($ct->gia_sp,0,',','.')}}</td>
                        <td>{{number_format($ct->thanh_tien,0,',','.')}}</td>
                    </tr>
                    @endforeach
               
                </tbody>
            </table>
            <a href="/orders" class="btn btn-danger btn-sm">Quay lại</a>
        </div>
    </div>

    <!-- Tổng tiền -->
    <div class="mt-4 text-end">
        <h3>Tổng tiền:</h3>
        <p class="lead">{{number_format($tongTien,0,',','.')}}VNĐ</p>
    </div>
</div>    

@endsection