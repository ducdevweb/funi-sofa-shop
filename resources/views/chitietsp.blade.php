@extends('layout')
@section('tieude')
chi tiết sản phẩm {{$sp->ten_sp}}

@endsection
@section('noidung')
<style>
    .kt{
        height: 150px;
    }
</style>
    @include('chitietsp_a')
    @include('chitietsp_binhluan')
    @include('chitietsp_lienquan')
    <div class="kt"></div>
    @endsection
    
@push('css') @endpush
@push('javascript1')  @endpush
@push('javascript2')  @endpush
