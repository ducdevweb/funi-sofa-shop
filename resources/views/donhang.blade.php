@extends('layout');
@section('tieude')
Đơn hàng
@endsection
@section('noidung')
<style>
        .container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn {
            margin: 5px;
        }
      
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Danh sách đơn hàng</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
             
                <th>Tên khách hàng</th>
                <th>Mã đơn hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Ngày mua</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if (count($donhang)>0)         
          @foreach ($donhang as $dh)
            <tr>
              
                <td>{{$dh->nguoiNhan}}</td>
                <td>{{$dh->maDon}}</td>
                <td>{{$dh->soDienThoai}}</td>
                <td>{{$dh->diaChi}}</td>
                <td>
                    @if ($dh->trangThai===0)
                    Chưa nhận hàng
                    @else
                    Đã nhận hàng
                @endif
            </td>
                <td>{{$dh->ngayMua}}</td>
                <td>
                    <a href="/detail_od/{{$dh->id_dh}}" class="btn btn-info btn-sm">Chi tiết</a>
                    <a href="/complete_od/{{$dh->id_dh}}" class="btn btn-danger btn-sm">Đã nhận</a>
                </td>
            </tr>
            @endforeach
            @else
            Bạn chưa có đơn hàng nào
            @endif
        </tbody>
    </table>
</div>

@endsection