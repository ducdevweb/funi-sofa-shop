<?php
    use App\Http\Controllers\AdminBaiViet;
    use App\Http\Controllers\AdminBinhLuan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AdminDanhMuc;
    use App\Http\Controllers\AdminDoanhThu;
    use App\Http\Controllers\AdminDonHang;
    use App\Http\Controllers\AdminNhaSanXuat;
    use App\Http\Controllers\AdminPhanHoi;
    use App\Http\Controllers\AdminSanpham;
    use App\Http\Controllers\AdminUser;
    use App\Http\Controllers\AdminVoucher;
    use App\Http\Controllers\NhanVienBaiViet;
    use App\Http\Controllers\NhanVienBinhLuan;
    use App\Http\Controllers\NhanVienController;
    use App\Http\Controllers\NhanVienDanhMuc;
    use App\Http\Controllers\NhanVienNhaSanXuat;
    use App\Http\Controllers\NhanVienPhanHoi;
    use App\Http\Controllers\NhanVienSanPham;
    use App\Http\Controllers\NhanVienVouchers;
    use App\Http\Controllers\ShipController;
    use App\Http\Controllers\ShopController;
    use App\Http\Controllers\UserController;
    use App\Http\Middleware\CartMiddleware;
    use App\Http\Middleware\MyMiddleware;
    use App\Http\Middleware\nhanvien;
    use App\Http\Middleware\shipper;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;

    Route::get('/', function () {
        return redirect('/godatviet/home_us');
    });

    Route::middleware('web')->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::apiResource('sanpham', AdminSanpham::class);
            Route::get('/doanhthu/pdf', [AdminDoanhThu::class, 'exportPDF'])->name('doanhthu.pdf');
            Route::get('/sp_nsx/{id_nsx}', [AdminSanpham::class, 'sp_nsx']);
            Route::get('/sp_danhmuc/{id_loaisp}', [AdminSanpham::class, 'sp_danhmuc']);
            Route::get('/verify_order/{id_dh}', [AdminController::class, 'verify_order'])->name('verify_order');

            Route::apiResource('user', AdminUser::class);
            Route::apiResource('binhluan', AdminBinhLuan::class);
            Route::apiResource('phanhoi', AdminPhanHoi::class);
            Route::apiResource('vouchers', AdminVoucher::class);
            Route::apiResource('donhang', AdminDonHang::class);
            Route::get('/detail_order/{id_dh}',[AdminDonHang::class,'detail_order']);
            Route::put('/order/{id_dh}/', [AdminDonHang::class, 'editTrangThai']);
            Route::get('/home_ad', [AdminController::class, 'index']);
            Route::apiResource('doanhthu', AdminDoanhThu::class);
            Route::apiResource('baiviet', AdminBaiViet::class);
            Route::apiResource('danhmuc', AdminDanhMuc::class);
            Route::apiResource('nhasanxuat', AdminNhaSanXuat::class);
            Route::get('/', [AdminController::class, 'index']);
        });

        Route::group(['prefix' => 'admin'], function () {
            Route::get('/dangnhap_ad', [AdminController::class, "dangnhap_ad"])->name('admin.login');
            Route::post('/dangnhap_ad_check', [AdminController::class, "login_ad"])->name('admin.check_login');
    Route::post('/dangxuat', [AdminController::class, "logout_ad"])->name('admin.logout')->middleware('auth:sanctum');
        });
    });


    Route::middleware('web')->group(function () {
        Route::group(['prefix' => 'nhanvien', 'middleware' => ['auth:sanctum',nhanvien::class]], function () {
            Route::apiResource('sanpham_nv', NhanVienSanPham::class);
            Route::get('/nv_sp_nsx/{id_nsx}',[NhanVienSanpham::class,'nv_sp_nsx']);
            Route::get('/nv_sp_danhmuc/{id_loaisp}',[NhanVienSanpham::class,'nv_sp_danhmuc']);
            Route::apiResource('binhluan_nv', NhanVienBinhLuan::class);
            Route::apiResource('vouchers_nv', NhanVienVouchers::class);
            Route::apiResource('baiviet_nv', NhanVienBaiViet::class);
            Route::apiResource('danhmuc_nv', NhanVienDanhMuc::class);
            Route::apiResource('phanhoi', NhanVienPhanHoi::class);
            Route::apiResource('nhasanxuat_nv', NhanVienNhaSanXuat::class);
            Route::get('/home_nv',[NhanVienController::class,'index'])->name('nhanvien.dashboard');
        });

        Route::group(['prefix' => 'nhanvien'], function () {
            Route::get('/dangnhap_nv', [NhanvienController::class, "login_nv"])->name('nhanvien.login');
            Route::post('/dangnhap_nv_check', [NhanvienController::class, "check_login_nv"])->name('nhanvien.check_login');
            Route::get('/dangxuat_nv', [NhanvienController::class, "logout_nv"])->name('nhanvien.logout')->middleware('auth:sanctum');
        });
    });

    Route::middleware('web')->group(function () {
        Route::group(['prefix' => 'godatviet', 'middleware' => [CartMiddleware::class]], function () {
            Route::get('/home_us',[ShopController::class,'index'])->name('users.login');
            Route::get('/voucher',[ShopController::class,'voucher']);
            Route::post('/apply',[ShopController::class,'apply']);
            Route::get('/detail/{id_sp}',[ShopController::class,'detail']);
            Route::get('/shop',[ShopController::class,'product']);
            Route::get('/article',[ShopController::class,'article']);
            Route::get('/article_ct/{id_bv}',[ShopController::class,'detail_article']);
            Route::get('/Cart',[ShopController::class,'cart'])->name('cart');
            Route::get('/addCart/{id_sp}',[ShopController::class,'addCart']);
            Route::get('/del_cart/{id_sp}', [ShopController::class,'del_cart']);
            Route::get('/cart/up/{id_sp}', [ShopController::class, 'UpQuantity']);
            Route::get('/search_order',[UserController::class,'searchOrder']);
            Route::get('/order_getStatus/{id_dh}', [UserController::class, 'order_getStatus']);
            Route::get('/detail_search/{id_dh}',[UserController::class,'detail_order']);
            Route::get('/cart/down/{id_sp}', [ShopController::class, 'DownQuantity']);
            Route::get('checkout',[ShopController::class,'checkout']);
            Route::post('/vnpay_payment',[UserController::class,'vnpay']);
            Route::patch('/voucher/update_usage', [ShopController::class, 'updateUsage']);
            Route::post('/complete_checkout',[UserController::class,'payment']);
            Route::get('/login',[UserController::class,'viewLogin'])->name('login');
            Route::post('/login_check',[UserController::class,'check_login'])->name('users.check');
            Route::get('/register',[UserController::class,'register']);
            Route::post('/register_check',[UserController::class,'check_register'])->name('users.check_register');
            Route::get('email/verify/{id}/{hash}', [UserController::class, 'verify'])
            ->name('verification.verify');
            Route::put('/order_cancel/{id_dh}', [UserController::class, 'order_cancel']);
            Route::post('/phanhoi', [ShopController::class, 'phanhoi']);
            Route::middleware('auth:sanctum')->group(function () {
                Route::get('/deltail_order/{id_dh}',[UserController::class,'detail_order']);
                Route::post('/user_update/{id}',[UserController::class,'update_in4']);
                Route::get('/infor/{id}',[UserController::class,'profile']);
                Route::get('/order',[UserController::class,'orders']);
                Route::get('/logout', [UserController::class, "logout"]);
                Route::post('/them_binhluan', [ShopController::class, 'them']);
                Route::post('/capnhat_binhluan/{id_bl}', [ShopController::class, 'capnhat']);
                Route::post('/xoa_bl/{id_bl}', [ShopController::class, 'xoa']);
                Route::get('/yeuthich', [ShopController::class, 'yeuthich']);
                Route::get('/them-yeuthich/{id_sp}', [ShopController::class, 'themYeuThich']);
                Route::get('/xoa-yeuthich/{id_sp}', [ShopController::class, 'xoaYeuThich']);
            });

        });
    });

    Route::get('/x', function (Request $request) {
        session()->flush();
        return response()->json(['message' => 'Session của bạn đã được xóa thành công'], 200);
    });
    Route::middleware('web')->group(function () {
        Route::group(['prefix' => 'shipper', 'middleware' => ['auth:sanctum',shipper::class]], function () {
            Route::get('/shipper',[ShipController::class,'shipper']);
            Route::get('/donhangdanggiao',[ShipController::class,'donhangdanggiao']);
            Route::get('/donhangdagiao',[ShipController::class,'donhangdagiao']);
            Route::get('/chitietdon/{id_dh}',[ShipController::class,'chitietdon']);
            Route::post('/capNhatTrangThai/{id_dh}', [ShipController::class, 'capNhatTrangThai']);
            Route::post('/guianh/{id_dh}',[ShipController::class,'guianh']);
        });

        Route::group(['prefix' => 'shipper'], function () {
            Route::get('/dangnhap_shipper', [ShipController::class, "login_shipper"]);
            Route::post('/dangnhap_shipper_check', [ShipController::class, "check_login_shipper"]);
            Route::get('/dangxuat_shipper', [ShipController::class, "logout_shipper"])->name('nhanvien.logout')->middleware('auth:sanctum');
        });
    });