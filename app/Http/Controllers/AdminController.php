<?php
namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.layout_admin");
    }
    public function login_ad(){
        return view('admin.dangnhap_ad');
    }
    public function home_ad(){
        return view("admin.home_ad");
    }
    public function check_login_ad(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('admin')->user();
            if ($user->role == 0) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();
                return back()->withErrors(['loginErr' => 'Bạn không đủ quyền hạn để đăng nhập']);
            }
        } else {
            return back()->withErrors(['loginErr' => 'Email hoặc mật khẩu không đúng']);
        }
    }
    
    public function logout_ad()
    {
        Auth::guard('admin')->logout();
        return redirect('/')->with('thongbao', 'Bạn đã thoát admin');
    }
    public function thongbao_ad(){
        return view('admin.thongbaoadmin');
    }
    public function donhang(){
        $donhangdathanhtoan=DB::table('donhang')->where('thanhToan',1)->orderBy('ngayMua','desc')->get();
        $donhangchuathanhtoan=DB::table('donhang')->where('thanhToan',0)->orderBy('ngayMua','desc')->get();
        return view('admin.donhang',compact('donhangdathanhtoan','donhangchuathanhtoan'));
    }

    public function doanhthu(Request $request)
    {
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
    
        $query = DB::table('chitiet')
            ->where('thanhToan',1)
            ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
            ->select('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', DB::raw('SUM(chitiet.soLuong) as soLuong'), DB::raw('SUM(chitiet.tongTien) as thanh_tien'));
    
        if ($ngay_from) {
            $query->whereDate('chitiet.ngayNhan', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereDate('chitiet.ngayNhan', '<=', $ngay_to);
        }
    
        $query->groupBy('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp');
    
        $doanhthu = $query->get();
        $tongdoanhthu = $doanhthu->sum('thanh_tien');
    
        return view('admin.doanhthu', compact('doanhthu', 'tongdoanhthu'));
    }
    public function doanhthuthieu(Request $request)
    {
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
    
        $query = DB::table('chitiet')
            ->where('thanhToan',0)
            ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
            ->select('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', DB::raw('SUM(chitiet.soLuong) as soLuong'), DB::raw('SUM(chitiet.tongTien) as thanh_tien'));
    
        if ($ngay_from) {
            $query->whereDate('chitiet.ngayNhan', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereDate('chitiet.ngayNhan', '<=', $ngay_to);
        }
    
        $query->groupBy('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp');
    
        $doanhthuthieu = $query->get();
        $tongdoanhthuthieu = $doanhthuthieu->sum('thanh_tien');
    
        return view('admin.doanhthuthieu', compact('doanhthuthieu', 'tongdoanhthuthieu'));
    }
    
    
    
    public function block($id) {
 
        $user = User::find($id);
        if ($user) {
            $user->status = ($user->status == 0) ? 1 : 0;
            $user->save();
        }
        return redirect()->back();
    }
    public function thanhtoan($id_dh = 0)
    {
        $thanhtoan = donhang::find($id_dh);
        if ($thanhtoan) {
            if ($thanhtoan->thanhToan == 0) {
                $thanhtoan->thanhToan = 1; 
            } else {
                $thanhtoan->thanhToan = 0; 
            }
            $thanhtoan->save();
            ChiTietDonHang::where('id_dh', $id_dh)->update(['thanhToan' => $thanhtoan->thanhToan]);
        }
    
        return redirect()->back();
    }
    
    public function feedback(){
        $feedback=DB::table('phanhoi')->orderBy('ngay_gui','desc')->get();
        return view('admin.user_feedback',compact('feedback'));
    }
}
