<?php

namespace App\Http\Controllers;

use App\Mail\GuiDon;
use App\Models\chitietdonhang;
use App\Models\donhang;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShipController extends Controller
{
    public function check_login_shipper(Request $request)
    {
        $check_account = $request->only('email', 'password');
    
        if (Auth::guard('shipper')->attempt($check_account)) {
            $user = Auth::guard('shipper')->user();
            if ($user->role == 3) {
                $token = $user->createToken('shipperToken')->plainTextToken;
                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'token' => $token,
                    'role' => $user->role,
                    'shipper' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone, 
                       
                    ]
                ], 200);
            } else {
                Auth::guard('shipper')->logout();
                return response()->json(['message' => 'Bạn không đủ quyền hạn để đăng nhập'], 403);
            }
        }
    
        return response()->json(['message' => 'Email hoặc mật khẩu không đúng'], 401);
    }

    public function shipper()
    {
        $soLuongDonHangDangGiao = donhang::whereIn('trangThai', [1, 2])->count();
        $soLuongDonHangDaGiao = donhang::where('trangThai', 3)->count();
        $tongsodon = donhang::whereIn('trangThai', [1, 2, 3])->count();
        $donHangs = donhang::whereIn('trangThai', [1, 2, 3])->get();
        $donhang=donhang::where('thanhToan',1);
        $tongtien = 0;

        foreach ($donHangs as $donHang) {
            $chiTietDonHang = chitietdonhang::where('id_dh', $donHang->id_dh)
            ->where('thanhToan',1)->get();
            $tongtien += $chiTietDonHang->sum('tongTien');
        }

        return response()->json([
            'soLuongDonHangDangGiao' => $soLuongDonHangDangGiao,
            'soLuongDonHangDaGiao' => $soLuongDonHangDaGiao,
            'tongsodon' => $tongsodon,
            'tongtien' => $tongtien
        ]);
    }


    public function donhangdanggiao()
    {
        $donHangs = donhang::whereIn('trangThai', [1, 2])->get();
        return response()->json($donHangs);
    }


    public function capNhatTrangThai($id_dh=0)
    {
        $donHang = donhang::find($id_dh);
        if ($donHang) {
            if ($donHang->trangThai == 1) {
                $donHang->trangThai = 2;
                $donHang->save();

                return response()->json(['success' => 'Cập nhật trạng thái thành công.']);
            } else {
                return response()->json(['error' => 'Đơn hàng này đang trong quá trình giao.'], 400);
            }
        }

        return response()->json(['error' => 'Đơn hàng không tồn tại.'], 404);
    }



    public function guianh(Request $request, $id_dh = 0)
    {
        $donhang = donhang::find($id_dh);
        if ($donhang && $donhang->trangThai == 2) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                
                $filename = time() . '.' . $file->getClientOriginalExtension();
                
                $file->storeAs('public/images', $filename);
    
                $donhang->hinhThanhToan = env('APP_URL').'/storage/user_img/' . $filename;
    
                $donhang->thanhToan = 1; 
                $donhang->trangThai = 3; 
                $donhang->save();
    
                $email = $donhang->email;
                $orderDetails = ChiTietdonhang::where('id_dh', $donhang->id_dh)->get();
                $tongTien = $orderDetails->sum('tongTien');
                Mail::to($email)->send(new GuiDon($donhang, $orderDetails, $tongTien));
    
                return response()->json([
                    'success' => 'Hình ảnh đã được cập nhật và email đã được gửi thành công.',
                    'link' => url(env('APP_URL').'storage/images/' . $filename), 
                ]);
            } else {
                return response()->json(['error' => 'Vui lòng tải lên hình ảnh.'], 400);
            }
        }
    
        return response()->json([
            'error' => 'Đơn hàng không hợp lệ hoặc chưa đến trạng thái "Đang giao".'
        ], 400);
    }
    
    
    
    public function chitietdon($id_dh)
    {
        $donHang = donhang::find($id_dh);
        if (!$donHang) {
            return response()->json(['error' => 'Đơn hàng không tồn tại.'], 404);
        }
        $chiTietDonHang = chitietdonhang::where('id_dh', $id_dh)->get();
        $tongTien = $chiTietDonHang->sum(function ($chiTiet) {
            return $chiTiet->gia_sp * $chiTiet->soLuong;
        });

        return response()->json([
            'donHang' => $donHang,
            'chiTietDonHang' => $chiTietDonHang,
            'tongTien' => $tongTien
        ]);
    }


    public function donhangdagiao()
    {
        $donHangs = donhang::where('trangThai', 3)->get();
        return response()->json($donHangs);
    }



}

