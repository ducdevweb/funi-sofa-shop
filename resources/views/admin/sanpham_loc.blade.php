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

        <!-- Lọc theo nhà sản xuất (Menu thả xuống) -->
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

        <!-- Nút thêm mới -->
        <div class="col-lg-2 col-md-6 mb-2">
            <div class="btn-group w-100">
                <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Thêm mới
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Thêm sản phẩm mới</a></li>
                    <li><a class="dropdown-item" href="#">Thêm danh mục mới</a></li>
                    <li><a class="dropdown-item" href="#">Thêm nhà sản xuất mới</a></li>
                </ul>
            </div>
        </div>
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
                           <th>Danh mục</th>
                           <th>Nhà Sản Xuất</th> 
                           <th>Giá Gốc</th>
                           <th>Giá Sale</th>
                           <th>Số Lượng Tồn</th>
                           <th>Chi Tiết</th>
                           <th>Thao Tác</th>
                        </tr>
                     </thead>
                     <tbody>
                           @if (isset($list_nsx))
                              @foreach ($list_nsx as $loc)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($loc->hinh) }}" alt="Product Image" class="small-product-img"></td>
                                    <td class="wrap-text">{{ $loc->ten_sp }}</td>
                                    <td class="wrap-text">{{ $loc->danhmuc->loai }}</td>
                                    <td class="wrap-text">{{ $loc->nsx->ten_nsx}}</td>
                                    <td>{{ number_format($loc->gia_sp) }} VNĐ</td>
                                    <td>{{ number_format($loc->giaSale) }} VNĐ</td>
                                    <td>{{ $loc->soLuong }}</td>
       
                                    <td><a href="{{ route('sanpham.show', $loc->id_sp) }}" class="btn btn-success">Xem</a></td>
                                    <td>
                                       <form action="{{ route('sanpham.destroy', $loc->id_sp) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                       </form>
                                    </td>
                              </tr>
                              @endforeach
                           @elseif (isset($list_sp))
                              @foreach ($list_sp as $loc)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($loc->hinh) }}" alt="Product Image" class="small-product-img"></td>
                                    <td class="wrap-text">{{ $loc->ten_sp }}</td>
                                    <td class="wrap-text">{{ $loc->danhmuc->loai }}</td>
                                    <td class="wrap-text">{{ $loc->nsx->ten_nsx}}</td>
                                    <td>{{ number_format($loc->gia_sp) }} VNĐ</td>
                                    <td>{{ number_format($loc->giaSale) }} VNĐ</td>
                                    <td>{{ $loc->soLuong }}</td>

                                    <td><a href="{{ route('sanpham.show', $loc->id_sp) }}" class="btn btn-success">Xem</a></td>
                                    <td>
                                       <form action="{{ route('sanpham.destroy', $loc->id_sp) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                       </form>
                                    </td>
                              </tr>
                              @endforeach
                           @else
                              <tr>
                                    <td colspan="10">Không có sản phẩm nào.</td>
                              </tr>
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

