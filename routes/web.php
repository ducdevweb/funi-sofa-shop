<?php

use App\Http\Controllers\AdminBinhLuan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoai;
use App\Http\Controllers\AdminLoaiController;
use App\Http\Controllers\AdminSanpham;
use App\Http\Controllers\AdminUser;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CartMiddleware;
use App\Http\Middleware\MyMiddleware;
use App\Http\Middleware\userLogin;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//user


    Route::middleware([CartMiddleware::class])->group(function () {
    //POST Routes
    Route::post('/dangky_', [UserController::class, "user_register"]);
    Route::post('/dangnhap', [UserController::class, "check_login"])->name('login');
    Route::post('/search', [SanphamController::class, 'search']);
    Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Hãy kiểm tra email của bạn!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    // GET Routes
    Route::get('/', [SanphamController::class, 'index'])->name('index');
    Route::get('/shop', [SanphamController::class, 'shop']);
    Route::get('/sptheonhasx/{id_nsx}', [SanphamController::class, 'sptheonhasx']);
    Route::get('/sptheoloai/{id_nsx}', [SanphamController::class, 'sptheoloai']);
    Route::get('sp/{id_sp}', [SanphamController::class, 'details']);
    Route::get('/thongbao', [SanphamController::class, 'thongbao']);
    Route::get('/thankyou', [SanphamController::class, 'thankyou']);
    Route::get('/lienhe', [SanphamController::class, 'lienhe']);
    Route::get('/dichvu', [SanphamController::class, 'dichvu']); 
    Route::get('/blog', [SanphamController::class, 'blog']); 
    Route::get('/vechungtoi', [SanphamController::class, 'vechungtoi']); 
    Route::get('/dangnhap', [UserController::class, "viewLogin"])->name('user.login');
    Route::get('/dangky', [UserController::class, "register"]);
    Route::get('/dangxuat', [UserController::class, "logout"])->name('user.logout');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    


    //user logged in    
Route::middleware([userLogin::class])->group(function () {
    // POST Routes
    Route::post('/cart/increase', [SanphamController::class, 'increaseQuantity'])->name('cart.increase');
    Route::post('/cart/decrease', [SanphamController::class, 'decreaseQuantity'])->name('cart.decrease');  
    Route::post('/savecoment', [SanphamController::class, 'savecoment']);      
    Route::post('/payment', [UserController::class, 'payment']); 
    Route::post('/feedback', [UserController::class, 'feedback']); 
    Route::post('/rating/{id_sp}', [UserController::class, 'rating']);
    Route::post('/update_in4', [UserController::class, 'update_in4'])->name('update_in4');
    // GET Routes
    Route::get('/delete_cmt/{id_bl}', [SanphamController::class, 'delete_cmt']);
    Route::get('/addCart/{id_sp}', [SanphamController::class, 'addCart']);
    Route::get('/cart', [SanphamController::class, 'viewCart']);
    Route::get('del_cart/{id_sp}', [SanphamController::class, 'del_cart']); 
    Route::get('/check_out',[SanphamController::class,"checkout"]);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/orders', [UserController::class, 'orders']);
    Route::get('/detail_od/{id_dh}', [UserController::class, 'detail_od']);
    Route::get('/complete_od/{id_dh}', [UserController::class, 'complete_od']);
  
});

});

//admin
Route::group(['prefix' => 'admin', 'middleware' => [MyMiddleware::class]], function() {
        Route::resource('loai', AdminLoai::class);
        Route::resource('sanpham', AdminSanpham::class);
        Route::resource('user', AdminUser::class);
        Route::get('/admin_binhluan',[AdminBinhLuan::class,"index"])->name('binhluan.index');
        Route::get('/doanhthu',[AdminController::class,"doanhthu"])->name('doanhthu');
        Route::get('/doanhthuthieu',[AdminController::class,"doanhthuthieu"])->name('doanhthuthieu');
        Route::get('/donhang',[AdminController::class,"donhang"]);
        Route::get('/feedback',[AdminController::class,"feedback"]);
        Route::get('/thanhtoan/{id_dh}',[AdminController::class,"thanhtoan"]);
        Route::get('/user/block/{id}', [AdminUser::class, 'block'])->name('user.block');
        Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/chitiet_bl/{id_sp}', [AdminBinhLuan::class, 'chitiet_bl'])->name('binhluan.show'); 
        Route::get('/danhgia_ct/{id_sp}', [AdminBinhLuan::class, 'danhgia_ct'])->name('binhluan.shows');
        Route::delete('/binhluan/{id_bl}', [AdminBinhLuan::class, 'xoa_bl'])->name('binhluan.destroy');
        Route::get('/danhgia/{id_dg}', [AdminBinhLuan::class, 'xoa_dg']);
    });

        Route::group(['prefix' => 'admin',], function() {
        Route::get('/thongbao_ad',[AdminController::class,"thongbao_ad"]);
      
        Route::get('/dangnhap', [AdminController::class, "login_ad"])->name('admin.login');
        Route::post('/dangnhap', [AdminController::class, "check_login_ad"]);
        Route::get('/dangxuat', [AdminController::class, "logout_ad"])->name('admin.logout');
        
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(MyMiddleware::class);
      
    });
    