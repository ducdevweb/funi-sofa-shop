<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    /**
     * Display the dashboard data.
     */
    public function index(Request $request)
    {
        $year = $request->input('year', now()->year);
        $sanpham=DB::table('sanpham')->orderByDesc('luot_mua')->limit(6)->get();
        $doanhthu = DB::table('chitiet')
            ->where('thanhToan', 1)
            ->whereYear('ngayNhan', $year) 
            ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
            ->select(
                DB::raw('MONTH(chitiet.ngayNhan) as month'),
                DB::raw('SUM(chitiet.tongTien) as thanh_tien')
            )
            ->groupBy(DB::raw('MONTH(chitiet.ngayNhan)'))
            ->orderBy('month')
            ->get();
    
        $doanhthu_12thang = array_fill(1, 12, 0);
        foreach ($doanhthu as $thang) {
            $doanhthu_12thang[$thang->month] = $thang->thanh_tien;
        }
        $doanhthu_12thang = array_values($doanhthu_12thang);
        $doanhthu_thang_nay = DB::table('chitiet')
            ->where('thanhtoan', 1)
            ->whereMonth('ngayNhan', now()->month)
            ->sum('tongTien');
    
        $doanhthu_thang_truoc = DB::table('chitiet')
            ->where('thanhtoan', 1)
            ->whereMonth('ngayNhan', now()->subMonth()->month)
            ->sum('tongTien');
    
        $doanhthu_thang_truoc_nua = DB::table('chitiet')
            ->where('thanhtoan', 1)
            ->whereMonth('ngayNhan', now()->subMonth(2)->month)
            ->sum('tongTien');
    
        $ti_le = 0;
        if ($doanhthu_thang_truoc > 0) {
            $ti_le = round($doanhthu_thang_nay > $doanhthu_thang_truoc
                ? ($doanhthu_thang_nay - $doanhthu_thang_truoc) / $doanhthu_thang_truoc * 100
                : ($doanhthu_thang_truoc - $doanhthu_thang_nay) / $doanhthu_thang_nay * 100);
        }else{
            $ti_le = 0;
        }
    
        $ti_le2 = 0;
        if ($doanhthu_thang_truoc_nua > 0) {
            $ti_le2 = round($doanhthu_thang_truoc > $doanhthu_thang_truoc_nua
                ? ($doanhthu_thang_truoc - $doanhthu_thang_truoc_nua) / $doanhthu_thang_truoc_nua * 100
                : ($doanhthu_thang_truoc_nua - $doanhthu_thang_truoc) / $doanhthu_thang_truoc_nua * 100);
        }else{
            $ti_le2 = 0;
        }
        return response()->json([
            'sanpham' => $sanpham,
            'doanhthu_12thang' => $doanhthu_12thang,
            'doanhthu_thang_nay' => $doanhthu_thang_nay,
            'doanhthu_thang_truoc' => $doanhthu_thang_truoc,
            'doanhthu_thang_truoc_nua' => $doanhthu_thang_truoc_nua,
            'ti_le' => $ti_le,
            'ti_le2' => $ti_le2,
            'year'=>$year,
        ]);
    }
    
    /**
     * Show the login form for employees.
     */
 
    /**
     * Check employee login credentials.
     */
    public function check_login_nv(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('nhanvien')->attempt($credentials)) {
            $user = Auth::guard('nhanvien')->user();
            if ($user->role == 2) {
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['message' => 'Đăng nhập thành công','token'=>$token ,'role'=>$user->role], 200);
            } else {
                Auth::guard('nhanvien')->logout();
                return response()->json(['message' => 'Bạn không đủ quyền hạn để đăng nhập'], 403);
            }
        }
    }

    /**
     * Log out employee.
     */
    public function logout_nv(Request $request)
    {
        try {
            if ($request->user()) {
                $request->user()->currentAccessToken()->delete(); 
            }
            Auth::guard('nhanvien')->logout(); 
            return response()->json(['message' => 'Đăng xuất thành công'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Đã xảy ra lỗi khi đăng xuất.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display notifications for employees.
     */
 

    /**
     * Get user feedback.
     */
    public function feedback()
    {
        $feedback = DB::table('phanhoi')->orderBy('ngay_gui', 'desc')->get();
        return response()->json($feedback);
    }
}
