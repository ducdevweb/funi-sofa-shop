<?php

namespace App\Http\Controllers;

use App\Models\donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', now()->year);
        $sanpham = DB::table('sanpham')->orderBy('luot_mua', 'desc')->limit(6)->get();
        $query = DB::table('chitiet')
            ->where('thanhToan', 1)
            ->whereYear('ngayNhan', $year)
            ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
            ->select(
                DB::raw('MONTH(chitiet.ngayNhan) as month'),
                DB::raw('SUM(chitiet.tongTien) as thanh_tien')
            )
            ->groupBy(DB::raw('MONTH(chitiet.ngayNhan)'));

        $doanhthu = $query->orderBy('month')->get();

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
        }

        $ti_le2 = 0;
        if ($doanhthu_thang_truoc_nua > 0) {
            $ti_le2 = round($doanhthu_thang_truoc > $doanhthu_thang_truoc_nua
                ? ($doanhthu_thang_truoc - $doanhthu_thang_truoc_nua) / $doanhthu_thang_truoc_nua * 100
                : ($doanhthu_thang_truoc_nua - $doanhthu_thang_truoc) / $doanhthu_thang_truoc_nua * 100);
        }
        return response()->json([
            'sanpham' => $sanpham,
            'doanhthu_12thang' => $doanhthu_12thang,
            'doanhthu_thang_nay' => $doanhthu_thang_nay,
            'doanhthu_thang_truoc' => $doanhthu_thang_truoc,
            'doanhthu_thang_truoc_nua' => $doanhthu_thang_truoc_nua,
            'ti_le' => $ti_le,
            'ti_le2' => $ti_le2,
            'year' => $year,
        ]);
    }
    public function dangnhap_ad()
    {
        return view('admin.dangnhap_ad');
    }
    public function login_ad(Request $request)
    {
        $check_account = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($check_account)) {
            $user = Auth::guard('admin')->user();
            if ($user->role == 0) {
                $token = $user->createToken('authToken')->plainTextToken;

                $userInfo = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'phone' => $user->phone,
                    'address' => $user->address,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];

                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'token' => $token,
                    'user' => $userInfo,
                ], 200);
            } else {
                Auth::guard('admin')->logout();
                return response()->json(['message' => 'Bạn không đủ quyền hạn để đăng nhập'], 403);
            }
        }

        return response()->json(['message' => 'Email hoặc mật khẩu không đúng'], 401);
    }


    public function logout_ad(Request $request)
    {
        try {
            if ($request->user()) {
                $request->user()->currentAccessToken()->delete();
            }
            Auth::guard('admin')->logout();
            return response()->json(['message' => 'Đăng xuất thành công'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Đã xảy ra lỗi khi đăng xuất.',
                'message' => $e->getMessage()
            ], 500);
        }
    }




    public function feedback()
    {
        $feedback = DB::table('phanhoi')->orderBy('ngay_gui', 'desc')->get();
        return response()->json($feedback);
    }


    // Verify Order (for ReactJS)
    public function verify_order($id_dh = 0)
    {
        $donHang = donhang::find($id_dh);
        if (!$donHang) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy đơn hàng.']);
        }

        $donHang->trangThai = 1;
        $donHang->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật đơn hàng thành công.']);
    }
}
