@extends('admin.layout_admin')

@section('tieude')
Quản lý sản phẩm
@endsection

@section('noidungchinh')
<style>
    .wrap-text {
        word-wrap: break-word; 
        word-break: break-word;
        white-space: normal; 
        max-width: 200px; 
    }
</style>
<div class="col-md-10 p-4">
    <div class="row mb-4">
      @foreach ($dem_sp as $sp)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <a href="/admin/sp_danhmuc/{{$sp->id_loaisp}}"><img class="product-img" src="{{$sp->danhmuc->hinh}}" alt=""></a>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">{{$sp->danhmuc->loai}}</h5>
                        <p class="card-text">{{$sp->total}} Sản phẩm</p>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
            </div>
        </div>
         @endforeach

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <img class="product-img" src="../VillaAgency-1.0 (1).0/assets/images/sofa1.jpg" alt="">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Các sản phẩm khác</h5>
                        <p class="card-text">105 Sản Phẩm</p>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 align-items-center">
        <div class="col-lg-5 col-md-6 mb-4">
            <form class="d-flex">
                <input type="text" name="search" class="form-control me-2" id="searchInput" placeholder="Tìm kiếm sản phẩm..." onkeyup="filterProducts()">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>


        <div class="col-lg-2 col-md-6 mb-2">
            <div class="btn-group w-100">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Lọc theo nhà sản xuất
                </button>
                <ul class="dropdown-menu">
                    @foreach ($nsx as $n)
                    <li><a class="dropdown-item" href="/admin/sp_nsx/{{$n->id_nsx}}">{{$n->ten_nsx}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-2">
    <a href="{{route('sanpham.create')}}" type="button" class="btn btn-primary w-100">
        <i class="bi bi-plus-circle"></i> Thêm Sản Phẩm
    </a>
</div>


    <!-- Bảng sản phẩm -->
    <div class="comment-container" id="commentContainer">
        <div class="comment">
            <div class="row mb-4">
                <div class="container mt-4">
                    <div class="card-body">
                        <table class="table table-hover table-responsive" id="productTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Nhà sản xuất</th>
                                    <th>Danh Mục</th>
                                    <th>Giá Gốc</th>
                                    <th>Giá Sale</th>
                                    <th>Số Lượng Tồn</th>
                                    <th>Chi Tiết</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if (isset($timkiem))
                              @foreach ($timkiem as $tk)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($tk->hinh) }}" alt="Product Image" class="small-product-img"></td>
                                    <td class="wrap-text">{{ $tk->ten_sp }}</td>
                                    <td class="wrap-text">{{ $tk->nsx->ten_nsx }}</td>
                                    <td class="wrap-text">{{ $tk->danhmuc->loai }}</td>
                                    <td>{{ number_format($tk->gia_sp) }} VNĐ</td>
                                    <td>{{ number_format($tk->giaSale) }} VNĐ</td>
                                    <td>{{ $tk->soLuong }}</td>
                                    <td><a href="{{ route('sanpham.show', $tk->id_sp) }}" class="btn btn-success">Xem</a></td>
                                    <td>
                                        <form action="{{ route('sanpham.destroy', $tk->id_sp) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                 @endforeach
                              @else
                                @foreach ($sanpham_arr as $sanpham)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($sanpham->hinh) }}" alt="Product Image" class="small-product-img"></td>
                                    <td class="wrap-text">{{ $sanpham->ten_sp }}</td>
                                    <td class="wrap-text">{{ $sanpham->nsx->ten_nsx }}</td>
                                    <td class="wrap-text">{{ $sanpham->danhmuc->loai }}</td>
                                    <td>{{ number_format($sanpham->gia_sp) }} VNĐ</td>
                                    <td>{{ number_format($sanpham->giaSale) }} VNĐ</td>
                                    <td>{{ $sanpham->soLuong }}</td>
                                    <td><a href="{{ route('sanpham.show', $sanpham->id_sp) }}" class="btn btn-success">Xem</a></td>
                                    <td>
                                    <form action="{{ route('sanpham.destroy', $sanpham->id_sp) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                            </form>

                                            <script>
                                                function confirmDelete() {
                                                    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
                                                }   
                                            </script>

                                    </td>
                                </tr>
                                @endforeach
                                 
                                 @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
