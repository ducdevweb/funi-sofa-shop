<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use App\Models\binhluan;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\danhGia;
use App\Models\sanpham;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\select;
use function PHPUnit\Framework\isEmpty;

class SanphamController extends Controller
{
    function index() {
      $sanphamdemo=DB::table('sanpham')
      ->select('id_sp','ten_sp','gia_sp','hinh','luotXem','danhGia','giaSale',
      'binhLuan','moTa','soLuong','loai_go','kich_thuoc','mau_sac','hot','bao_hanh')
      ->where('anHien',1)
     ->orderBy('luotXem','desc')
     ->limit(3)
     ->get();
  
      return view('home',['sanphamdemo'=>$sanphamdemo]);
      
    }
    public function thongbao(){
      return view('thongbao');
    }
    public function __construct()
    {
        $nsx = DB::table('nsx')->orderBy('thuTu', 'desc')->get();
        View::share('nsx', $nsx);
        $loai_sp = DB::table('loai_sp')->orderBy('id_loaisp', 'desc')->get();
        View::share('loai_sp', $loai_sp);
    }
    public function shop(){
      $sanpham=DB::table('sanpham')
      ->select('id_sp','ten_sp','gia_sp','hinh','luotXem','danhGia','giaSale',
      'binhLuan','moTa','soLuong','loai_go','kich_thuoc','mau_sac','hot','bao_hanh')
      ->where('anHien',1)
     ->orderBy('luotXem','desc')
     ->distinct()
     ->limit(15)
     ->get();
      return view('sanpham',['sanpham'=>$sanpham]);
    }
    function sptheoloai($id_loaisp=0){
        if (is_numeric($id_loaisp)==false)
        return redirect("/thongbao") ->with("thongbao","sản phẩm này không tồn tại: " . $id_loaisp);
        $ten_loai = DB::table('loai_sp')
        ->where('id_loaisp', $id_loaisp)
        ->value('loai');
  
        $loaisp = DB::table('sanpham')
        ->where('id_loaisp', $id_loaisp)
        ->get();
        return view('sp_theogia',['id_loaisp', $id_loaisp, 'loai'=>$ten_loai, 'loaisp'=>$loaisp]);
    }
    function sptheonhasx($id_nsx=0){
      if (is_numeric($id_nsx)==false)
      return redirect("/thongbao") ->with("thongbao","sản phẩm này không tồn tại: " . $id_nsx);
      $ten_nhasx = DB::table('nsx')
      ->where('id_nsx', $id_nsx)
      ->value('ten_nsx');

      $listsp = DB::table('sanpham')
      ->where('id_nsx', $id_nsx)
      ->get();
      return view('sp_theonhasx_a',['id_nsx', $id_nsx, 'ten_nsx'=>$ten_nhasx, 'listsp'=>$listsp]);
  }
    function details($id_sp=0){
      if (is_numeric($id_sp==false)) {
        return redirect()->with("thongbao",'Sản phẩm không tồn tại:'.$id_sp);
      }else{
        $luotXem=sanpham::find($id_sp);
        if($luotXem){
            $luotXem->luotXem+=1;
            $luotXem->save();
        }
        $sp=DB::table('sanpham')
        ->where('id_sp',$id_sp)->first();
      }
      $binhluan=binhluan::where('id_sp',$id_sp)->orderBy('ngayDang','desc')->get();
      $danhgia=danhGia::where('id_sp',$id_sp)->orderBy('ngayDang','desc')->get();
      $Tb_sao = danhGia::where('id_sp', $id_sp)->avg('danhGia');
      $lienquan=DB::table('sanpham')
      ->select('id_sp','ten_sp','gia_sp','hinh','luotXem','danhgia','giaSale','binhLuan','moTa')
      ->where('anHien',1)->orderBy('luotXem','desc')->limit(4)->get();
      return view('chitietsp', compact(['sp','binhluan','lienquan','danhgia','Tb_sao']));

    }
    
    public function savecoment()
    {
        $id_nd = Auth::user()->id;
        $ten_nd=Auth::user()->name;
        $arr = request()->post();
        $id_sp = (Arr::exists($arr, 'id_sp')) ? $arr['id_sp'] : "-1";
        $noidung = (Arr::exists($arr, 'noidung')) ? $arr['noidung'] : "";
    
        if ($id_sp <= -1) {
            return redirect('/thongbao')-> with(['thongbao' => 'Không biết id sản phẩm']);
        }
    
        if ($noidung == "") {
            return redirect('/thongbao')-> with(['thongbao' => 'Không có bình luận nào']);
        }
    
        binhluan::insert([
            'id_nd' => $id_nd,
            'ten_nd'=>$ten_nd,
            'id_sp' => $id_sp,
            'noiDung' => $noidung,
            'ngayDang' => now()
        ]);
        $sanpham=sanpham::find($id_sp);
       if($sanpham){
        $tangBinhLuan=$sanpham->binhluan;
        sanpham::where('id_sp',$id_sp)->update([
            'binhluan'=>$tangBinhLuan+1
        ]);
        
       }else{
        return redirect('/thongbao')->with('thongbao', 'Sản phẩm không tồn tại');   
       }
        return redirect('/thongbao')->with(['thongbao' => 'Đã đăng bình luận']);
    }
    public function search(Request $request)
    {
        $search = $request->input('keyword');
        $results = sanpham::where('ten_sp', 'LIKE', '%' . $search . '%')->get();
        return view('sp_timkiem', compact('results'));
    }
    
    public function delete_cmt($id_bl) {
        $cmt = binhluan::find($id_bl);
        $id_nd = Auth::user()->id;
        if (!$cmt || $cmt->id_nd != $id_nd) {
            return redirect('/thongbao')->with(['thongbao' => 'Bình luận không tồn tại hoặc bạn không có quyền xóa bình luận này']);
        }
        $cmt->delete();
        return redirect('/thongbao')->with(['thongbao' => 'Bình luận đã được xóa']);
    }
    
    public function addCart(Request $request, $id_sp = 0, $soluong = 1)
    {
        $id_nd = Auth::user()->id;
        $cartData = $request->session()->get('cart_data', ['cart' => [], 'id_nd' => $id_nd]);
        if (!is_array($cartData) || !isset($cartData['cart'])) {
            $cartData = ['cart' => [], 'id_nd' => $id_nd];
        }
    
        $cart = $cartData['cart'];
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index !== false) {
            $cart[$index]['soluong'] += $soluong;
        } else {
            $cart[] = ['id_sp' => $id_sp, 'soluong' => $soluong];
        }
        $request->session()->put('cart_data', ['cart' => $cart, 'id_nd' => $id_nd]);
        $tongsoluong = array_sum(array_column($cart, 'soluong'));
        $request->session()->put('tongsoluong', $tongsoluong);
    
        return back();
    }
    
    
    public function viewCart(Request $request)
{
    $id_nd = Auth::user()->id;
    $cartData = $request->session()->get('cart_data', ['cart' => [], 'id_nd' => $id_nd]);

    if (empty($cartData) || $cartData['id_nd'] !== $id_nd) {
        $cart = [];
        $tongsoluong = 0;
        $tongtien = 0;
    } else {
        $cart = $cartData['cart'];
        $tongsoluong = 0;
        $tongtien = 0;

        foreach ($cart as $i => $sp) {
            $id_sp = $sp['id_sp'] ?? null;
            if ($id_sp) {
                $sanpham = DB::table('sanpham')->where('id_sp', $id_sp)->first();
                $ten_sp = $sanpham->ten_sp ?? 'Tên sản phẩm không có';
                $gia_sp = $sanpham->gia_sp ?? 0;
                $giaSale = $sanpham->giaSale ?? 0;
                $hinh = $sanpham->hinh ?? 'momo.jpg';

                $thanhtien = ($giaSale > 0 ? $giaSale : $gia_sp) * ($sp['soluong'] ?? 0);

                $tongsoluong += $sp['soluong'] ?? 0;
                $tongtien += $thanhtien;

                $cart[$i] = array_merge($sp, [
                    'id_sp' => $id_sp,
                    'ten_sp' => $ten_sp,
                    'gia_sp' => $gia_sp,
                    'giaSale' => $giaSale,
                    'hinh' => $hinh,
                    'thanhtien' => $thanhtien,
                ]);
            }
        }

        $request->session()->put('cart_data', [
            'cart' => $cart,
            'id_nd' => $id_nd
        ]);

        $request->session()->put('tongsoluong', $tongsoluong);
    }

    return view('hiengiohang', compact('cart', 'id_nd', 'tongsoluong', 'tongtien'));
}

    public function increaseQuantity(Request $request)
    {
        $cartData = session()->get('cart_data', []);
        $cart = $cartData['cart'] ?? [];
        $id_sp = $request->input('id');
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index !== false) {
            $quantity = $cart[$index]['soluong'];
            $quantity++;
            if ($quantity > 10) {
                $quantity = 10;
            }
            $cart[$index]['soluong'] = $quantity;
            $cart[$index]['thanhtien'] = $quantity * ($cart[$index]['giaSale'] ?: $cart[$index]['gia_sp']);
            $cartData['cart'] = $cart;
            session()->put('cart_data', $cartData);
        }
    
        return redirect()->back();
    }
    
    public function decreaseQuantity(Request $request)
    {
        $cartData = session()->get('cart_data', []);
        $cart = $cartData['cart'] ?? [];
        $id_sp = $request->input('id');
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
    
        if ($index !== false) {
            $quantity = $cart[$index]['soluong'];
            $quantity--;
            if ($quantity < 1) {
                $quantity = 1;
            }
            $cart[$index]['soluong'] = $quantity;
            $cart[$index]['thanhtien'] = $quantity * ($cart[$index]['giaSale'] ?: $cart[$index]['gia_sp']);
            $cartData['cart'] = $cart;
            session()->put('cart_data', $cartData);
        }
    
        return redirect()->back();
    }
    
    public function del_cart(Request $request, $id_sp = 0)
    {
        $cartData = $request->session()->get('cart_data', []);
        $cart = $cartData['cart'] ?? [];
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
    
        if ($index !== false) {
            array_splice($cart, $index, 1);
            $cartData['cart'] = $cart;
            $request->session()->put('cart_data', $cartData);
        }
    
        return redirect()->back();
    }
    
    public function checkout(Request $request)
{
    $cartData = $request->session()->get('cart_data', []);
    $id_nd = Auth::user()->id; 

    if (isset($cartData['cart']) && !empty($cartData['cart'])) {
        $check_out = $cartData['cart'];
    } else {
        $check_out = [];
    }

    return view('checkout', compact('check_out', 'id_nd')); 
}

 public function thankyou(){
    return view('thankyou');
 }
 
 public function dichvu(){
    return view('dichvu');
 }
 public function lienhe(){
    return view('lienhe');
 }
 public function blog(){
    return view('blog');
 }
 public function vechungtoi(){
    return view('vechungtoi');
 }



}