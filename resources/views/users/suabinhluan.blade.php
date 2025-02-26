@extends('users.layout')
  @section('tieude')
  Trang chỉnh sửa bình luận
  @endsection
  @section('noidung')
        <div class="container">
            <h2>Sửa bình luận</h2>
            <form action="{{ route('users.capnhat', $binhluan->id_bl) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="danhgia">Đánh giá (từ 1 đến 5 sao)</label>
                    <select name="danhgia" id="danhgia" class="form-control" required>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $i == $binhluan->danhgia ? 'selected' : '' }}>{{ $i }} sao</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group mt-2">
                    <textarea name="noiDung" class="form-control" rows="3" placeholder="Nhập bình luận của bạn" required>{{ $binhluan->noiDung }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
            </form>
        </div>
  @endsection
