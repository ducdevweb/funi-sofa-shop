@extends('admin.layout_admin')

@section('tieude')
Quản lý phản hồi
@endsection

@section('noidungchinh')

<div class="col-md-10 p-4">
          <!-- Cards -->
<div class="row mb-4">
<div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('phanhoi.index') }}" method="GET">
          
            <input type="hidden" name="filter" value="total">
            <div class="card text-white bg-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Tổng Số Phản Hồi</h5>
                        <p class="card-text">{{$total_phanhoi}} phản hồi</p>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem phản hồi</button>
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('phanhoi.index') }}" method="GET">
          
            <input type="hidden" name="filter" value="available">
            <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Phản hồi chưa xử lý</h5>
                        <p class="card-text">{{$phanhoi}} Phản hồi </p>
                    </div>
                    <i class="bi bi-bag-check fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem phản hồi</button>
            </div>
        </form>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <form action="{{ route('phanhoi.index') }}" method="GET">
          
            <input type="hidden" name="filter" value="expired">
            <div class="card text-white bg-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Phản hòi đã xử lý</h5>
                        <p class="card-text">{{$phanhoi2}}Phản hồi</p>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
                <button type="submit" class="btn btn-light">Xem phản hồi</button>
            </div>
        </form>
    </div>


</div>
<form action="{{ route('vouchers.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="hidden" name="filter" value="search"> 
        <input type="text" name="search" class="form-control" placeholder="Nhập mã giảm giá">
        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
    </div>
</form>
<div class="comment-container" id="commentContainer">
        <div class="comment">
        @if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
  @endif
            <form>
                <div class="row mb-4">
                    <div class="container mt-4">
                        <div class="card-header">
                            <div class="card-body">
                                <table class="table table-hover table-responsive">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 15%;">Tên Khách Hàng</th>
                                            <th class="text-center" style="width: 10%;">Email</th>
                                            <th class="text-center" style="width: 10%;">Nội dung</th>
                                            <th class="text-center" style="width: 10%;">Trạng Thái</th>
                                            <th class="text-center" style="width: 10%;">Ngày Nhận</th>
                                            <th class="text-center" style="width: 5%;">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($phanhoi_arr))
                                        @foreach($phanhoi_arr as $ph)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $ph->ho_ten }}</td>
                                            <td>{{ $ph->email }}</td>                                            
                                            <td>{{ $ph->loi_nhan }}</td>
                                            <td>{{ $ph->da_xu_ly == 0 ? 'Chưa xử lý' : 'Đã xử lý' }}</td> 
                                            <td>{{ \Carbon\Carbon::parse($ph->ngay_gui)->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($ph->da_xu_ly == 0 )
                                                <a href="{{route('phanhoi.show',$ph->id_ph)}}" class="btn btn-primary btn-lg" role="button"> Hoàn thành </a></td>
                                                 @endif

                                        </tr>
                                        @endforeach
                                            @else
                                            <tr>
                                                <td colspan="11" class="text-center">Không có đơn hàng này</td> 
                                            </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
   

@endsection