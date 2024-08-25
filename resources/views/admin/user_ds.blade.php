@extends('admin/layout_admin')
@section('tieude', 'Danh Sách Người Dùng')
@section('noidungchinh')
<div class="container mt-5">
    <h1 class="mb-4">Danh Sách Người Dùng</h1>
    <div class="row">
        @foreach ($user_arr as $user) 
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ $user->image }}" class="card-img-top" alt="{{ $user->name }}" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Địa chỉ:</strong> {{ $user->address }}</p>
                    <p class="card-text"><strong>Số điện thoại:</strong> {{ $user->phone }}</p>
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-block">SỬA THÔNG TIN</a>
                    <a href="{{ route('user.block', $user->id) }}" class="btn btn-warning btn-sm">
                        {{ $user->status == 0 ? 'Chặn người dùng' : 'Bỏ chặn' }}
                    </a>


                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
