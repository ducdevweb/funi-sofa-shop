<?php

namespace App\Http\Controllers;

use App\Mail\GuiDon;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('users.login');
    }


    public function check_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->email_verified_at == null) {
                Auth::logout();
                return response()->json(['message' => 'Bạn chưa xác thực tài khoản'], 405);
            }
            if ($user->status != 0) {
                Auth::logout();
                return response()->json(['message' => 'Bạn đã bị block vô thời hạn'], 403);
            }

            $token = $user->createToken('authToken')->plainTextToken;
            $response = [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => $user->address,
                    'phone' => $user->phone,
                    'status' => $user->status,
                ],
                'type_token' => 'Bearer',
                'token' => $token,
            ];
            if ($user->role == 1) {
                $response['redirect'] = 'http://localhost:3000';
            } elseif ($user->role == 3) {
                $response['redirect'] = 'http://localhost:3001/Shipperlogin';
            } elseif ($user->role == 0) {
                $response['redirect'] = 'http://localhost:3002/adminlogin';
            }

            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Email hoặc mật khẩu của bạn không đúng'], 401);
        }
    }





    public function logout(Request $request)
    {
        try {
            if ($request->user()) {
                $request->user()->currentAccessToken()->delete();
            }
            Auth::guard('web')->logout();
            return response()->json(['message' => 'Đăng xuất thành công'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Đã xảy ra lỗi khi đăng xuất.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function verify($id, $hash)
    {
        $user = User::findOrFail($id);
        $user->markEmailAsVerified();
        return redirect()->to('http://localhost:3000/login')->with('status', 'Email xác nhận thành công');
    }
    public function register()
    {
        return response()->json(['view' => 'users.register']);
    }
    public function check_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'first_email' => 'required|string|max:255|unique:users,first_email',
            'password' => 'required|min:6|confirmed',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.unique' => 'Số điện thoại đã được sử dụng!',
            'first_email.unique' => 'Email đã được sử dụng!',
            'password.confirmed' => 'Mật khẩu không khớp!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $new_user = new User;

        $new_user->first_email = strtolower(trim(strip_tags($request['first_email'])));
        $new_user->email = $request->input('first_email') . $request->input('last_email');
        $new_user->name = trim(strip_tags($request['name']));
        $new_user->phone = trim(strip_tags($request['phone']));
        $new_user->password = Hash::make(trim(strip_tags($request['password'])));
        $new_user->address = trim(strip_tags($request['address']));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = $file->store('user_img', 'public'); 
            $new_user->image = env('APP_URL') . 'storage/user_img/' . $imagePath;
        }
        
            $new_user->save();

            $new_user->notify(new VerifyEmailNotification());

            return response()->json([
                'message' => 'Vui lòng vào email và xác nhận',
                'redirect' => '/localhost:3000/login'
            ]);
        
    }

    public function profile($id = 0)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }

    public function update_in4(Request $request, $id = 0)
    {

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $user->image = env('APP_URL') . 'storage/images/' . $filename;
        }
         else {
            $user->image = $request->input('hinhcu');
        }

        if ($request->filled('pass1')) {
            $user->password = Hash::make($request->input('pass1'));
        }

        $user->save();
        return response()->json(['message' => 'Đổi thông tin thành công', 'user' => $user, 200]);
    }





    public function orders(Request $request)
    {
        $id = $request->input('user_id');

        if (!is_numeric($id)) {
            return response()->json(['message' => 'Người dùng không tồn tại: ' . $id], 404);
        }
        $orders = DB::table('donhang')->where('id_nd', $id)->get();
        return response()->json(['orders' => $orders]);
    }

    public function detail_order($id_dh = 0)
    {
        if (!is_numeric($id_dh)) {
            return response()->json(['message' => 'Đơn hàng không tồn tại: ' . $id_dh], 404);
        }

        $detail_od = DB::table('chitiet')->where('id_dh', $id_dh)->get();

        if ($detail_od->isEmpty()) {
            return response()->json(['message' => 'Không có chi tiết đơn hàng cho mã đơn: ' . $id_dh], 404);
        }

        $tongTien = $detail_od->sum('thanh_tien');

        return response()->json(['detail' => $detail_od, 'total' => $tongTien]);
    }

    public function searchOrder(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string|max:255',
        ]);
        $orderCode = $request->input('order_code');
        $order = donhang::where('maDon', $orderCode)->first();
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng với mã: ' . $orderCode], 404);
        }
        return response()->json(['order' => $order], 200);
    }

    public function order_getStatus($id_dh = 0)
    {
        if (!is_numeric($id_dh)) {
            return response()->json(['message' => 'Đơn hàng không tồn tại: ' . $id_dh], 404);
        }
        $order = DB::table('donhang')->where('id_dh', $id_dh)->first();
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng với ID: ' . $id_dh], 404);
        }
        return response()->json(['order' => $order]);
    }
    public function vnpay(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:3000/checkout";
        $vnp_TmnCode = "56F4FNRW";
        $vnp_HashSecret = "P5W2FYJFDI1LL1YYLHQRXGP1I2FDYA53";

        $vnp_TxnRef = random_int(100000, 900000);
        $vnp_OrderInfo = $request->input('order_info', 'Thanh toán đơn hàng');
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $query = "";
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            $hashdata .= ($hashdata ? '&' : '') . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url .= "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return response()->json(['code' => '00', 'message' => 'success', 'data' => $vnp_Url]);
    }


    /**
     * 
     *
     * @param string $email
     * @return bool
     */
    // private function isEmailValid($email)
    // {
    //     $client = new Client();
    //     $apiKey = 'ca25969686a0472e884acca0adac8976'; 

    //     try {
    //         $response = $client->get("https://api.zerobounce.net/v2/validate", [
    //             'query' => [
    //                 'api_key' => $apiKey,
    //                 'email' => $email,
    //             ],
    //         ]);

    //         $result = json_decode($response->getBody(), true);
    //         Log::info('   response: ' . json_encode($result));  // Log the response to check

    //         if (isset($result['status']) && $result['status'] === 'valid') {
    //             return true;  // Email valid
    //         } else {
    //             return false;  // Email invalid
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error checking email: ' . $e->getMessage());
    //         return false;
    //     }

    // }
    public function payment(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'note' => 'nullable|string',
                'payment_method' => 'required|string',
                'cart_items' => 'required|array',
                'cart_items.*.id_sp' => 'required|integer',
                'cart_items.*.ten_sp' => 'required|string',
                'cart_items.*.gia_sp' => 'required|numeric',
                'cart_items.*.giaSale' => 'nullable|numeric',
                'cart_items.*.hinh' => 'required|string',
                'cart_items.*.quantity' => 'required|integer',
                'cart_items.*.thanhtien' => 'required|numeric',
                'tongtien' => 'required|numeric|min:0',
            ]);

            $id = $request->input('id');
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $note = $request->input('note');
            $cartItems = $request->input('cart_items');
            $tongTien = $request->input('tongtien');
            $vnp_ResponseCode = $request->input('vnp_ResponseCode');
            $vnp_TransactionStatus = $request->input('vnp_TransactionStatus');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Địa chỉ email không hợp lệ.',
                ], 400);
            }

            // if (!$this->isEmailValid($email)) {
            //     return response()->json([
            //         'status' => 'error',
            //         'message' => 'Email không hợp lệ hoặc không tồn tại. Vui lòng nhập email thật.',
            //     ], 400);
            // }
            $donhang = new DonHang();
            $donhang->id_nd = $id;
            $donhang->tenNguoiNhan = $name;
            $donhang->email = $email;
            $donhang->soDienThoai = $phone;
            $donhang->diaChi = $address;
            $donhang->ghiChu = $note;
            $donhang->trangThai = 0;
            $donhang->Hinh_thuc = ($vnp_ResponseCode == '00' && $vnp_TransactionStatus == '00') ? 1 : 0;
            $donhang->thanhToan = ($vnp_ResponseCode == '00' && $vnp_TransactionStatus == '00') ? 1 : 0;
            $donhang->ngayMua = now();
            $donhang->maDon = strtoupper(bin2hex(random_bytes(5 / 2)));

            $donhang->save();

            foreach ($cartItems as $item) {
                $sanpham = SanPham::find($item['id_sp']);
                if ($sanpham) {
                    if ($sanpham->soLuong < $item['quantity']) {
                        return response()->json([
                            'status' => 'error',
                            'message' => "Sản phẩm {$sanpham->ten_sp} không đủ số lượng trong kho.",
                        ], 400);
                    }

                    $sanpham->decrement('soLuong', $item['quantity']);
                    $sanpham->increment('luot_mua');

                    $chiTiet = new ChiTietDonHang();
                    $chiTiet->id_dh = $donhang->id_dh;
                    $chiTiet->id_sp = $item['id_sp'];
                    $chiTiet->gia_sp = $item['giaSale'] < 1 ? $item['gia_sp'] : $item['giaSale'];
                    $chiTiet->ten_sp = $item['ten_sp'];
                    $chiTiet->hinh = $item['hinh'];
                    $chiTiet->soLuong = $item['quantity'];
                    $chiTiet->thanh_tien = $item['giaSale'] < 1 ? $item['gia_sp'] : $item['giaSale'];
                    $chiTiet->tongTien += $item['thanhtien'];
                    $chiTiet->ngayNhan=Carbon::now();
                    $chiTiet->save();
                }
            }

            $orderDetails = ChiTietDonHang::where('id_dh', $donhang->id_dh)->get();

            try {
                Mail::to($email)->send(new GuiDon($donhang, $orderDetails, $tongTien));
            } catch (\Exception $e) {
                Log::error('Lỗi gửi email: ' . $e->getMessage());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không thể gửi email. Vui lòng kiểm tra email và thử lại.',
                ], 400);
            }
     if ($donhang->thanhToan == 1) {
        ChiTietDonHang::where('id_dh', $donhang->id_dh)
            ->update(['thanhToan' => 1]);
    }
            return response()->json([
                'status' => 'success',
                'message' => 'Đơn hàng đã được đặt và email xác nhận đã được gửi.',
                'redirect' => '/order',
                'order_details' => [
                    'order_id' => $donhang->id_dh,
                    'order_details' => $cartItems,
                    'total_amount' => $tongTien,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Lỗi xử lý đơn hàng: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra trong quá trình xử lý đơn hàng.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
  
    public function order_cancel($id_dh = 0)

    {

        if (!is_numeric($id_dh)) {

            return response()->json(['message' => 'Đơn hàng không tồn tại: ' . $id_dh], 404);
        }


        $order = DB::table('donhang')->where('id_dh', $id_dh)->first();


        if (!$order) {

            return response()->json(['message' => 'Không tìm thấy đơn hàng với ID: ' . $id_dh], 404);
        }

        DB::table('donhang')->where('id_dh', $id_dh)->update(['trangThai' => 4]);

        return response()->json(['message' => 'Hủy đơn hàng thành công']);
    }
}
