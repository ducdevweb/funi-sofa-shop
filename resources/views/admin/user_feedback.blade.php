@extends('admin/layout_admin')
@section('tieude', 'Phản Hồi của Người Dùng')

@section('noidungchinh')
<div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Danh Sách Phản Hồi</h4>
        </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Người Dùng</th>
                        <th>Emai</th>
                        <th>Phản Hồi</th>   
                        <th>Ngày</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedback as $fb)
                    <tr>
                        <td>{{ $fb->id_user}}</td>
                        <td>{{ $fb->ho_ten }}</td>
                        <td>{{ $fb->email }}</td>
                        <td>{{ $fb->loi_nhan }}</td>
                        <td>{{ $fb->ngay_gui }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
