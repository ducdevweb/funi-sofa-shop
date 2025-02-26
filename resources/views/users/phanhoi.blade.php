@extends('users.layout')
@section('tieude')@endsection
@section('noidung')
<div>

    <div class="contact-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-7">

          <form id="contact-form" action="{{ route('users.phanhoi') }}" method="post">
            @csrf <!-- Thêm CSRF token -->
            <div class="row">
                <div class="col-lg-12">
                    <fieldset>
                        <label for="name">Họ và Tên</label>
                        <input type="text" name="ho_ten" id="name" placeholder="Tên của bạn..." autocomplete="on" required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <label for="email">Địa Chỉ Email</label>
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email của bạn..." required="">
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <label for="message">Tin Nhắn</label>
                        <textarea name="loi_nhan" id="message" placeholder="Tin nhắn của bạn" required></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Gửi Tin Nhắn</button>
                    </fieldset>
                </div>
            </div>
        </form>


          </div>

          <!-- Có thể thêm các phần khác ở đây -->

        </div>
      </div>
    </div>

</div>
@endsection
