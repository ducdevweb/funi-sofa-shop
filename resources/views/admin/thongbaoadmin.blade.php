@extends('admin/layout_admin')
@section('tieude')
Thông báo
@endsection
@section('noidungchinh')
@if(session()->has('thongbao_ad'))
    <div class="alert alert-success">
        {{ session('thongbao_ad') }}
    </div>
    <script>
            setTimeout(function() {
                window.history.back();
            }, 1000);
        </script>
@endif
@endsection