@extends('layout')

@section('tieude') Thông báo @endsection

@section('noidung')
    @if(session()->has('thongbao'))
        <div class="alert alert-info p-5 shadow-lg border-2 border-info rounded" id="notification">
            <h1 class="display-4 font-weight-bold text-center">{{ Session::get('thongbao') }}</h1>
        </div>

        <style>
            #notification {
                max-width: 600px; 
                margin: 0 auto; 
                background-color: #d9f7ff; 
                color: #003d66; 
                border: 2px solid #5bc0de;
                border-radius: 10px;
                padding: 20px;
                text-align: center;
            }
            #notification h1 {
                font-size: 2rem;
                font-weight: bold; 
            }
            .alert-info {
                border-color: #5bc0de;
            }
        </style>

        <script>
            setTimeout(function() {
                window.location.href = document.referrer || '/'; 
            }, 2000);
        </script>
    @endif
@endsection
