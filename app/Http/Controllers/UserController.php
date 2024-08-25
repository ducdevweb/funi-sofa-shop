<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\chitietdonhang;
use App\Models\danhGia;
use App\Models\donhang;
use App\Models\phanhoi;
use App\Models\sanpham;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view("login");
    }

    public function check_login(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $user = Auth::guard('web')->user();
            if($user->status == 0){
            if ($user->role == 1) {
                return redirect()->intended('/'); 
            } else {
                return redirect()->route('admin.dashboard');  
            }
        }else{       
            Auth::guard('web')->logout();   
            return back()->withErrors(['loginErr' => 'Bạn đã bị block vô thời hạn']);
        }
        } else {
            return back()->withErrors(['loginErr' => 'Email hoặc mật khẩu của bạn không đúng']);
        }
    }

    public function logout(Request $request)
    {
        $id_nd=Auth::user()->id;
        $cartData = $request->session()->get('cart_data', ['cart' => [], 'id_nd' => $id_nd]);
        Auth::guard('web')->logout();
        $request->session()->flush();
    
        return redirect('/')->with('thongbao', 'Đã đăng xuất ra khỏi trang web');
    }
    public function register(){
        return view('register');
    }
    public function user_register(RegisterRequest $request){
        $new_user=new User;
        $existingUser = User::where('phone', $request['phone'])->first();
        if ($existingUser) {
            return redirect('/thongbao')->with('thongbao', 'Số điện thoại đã được sử dụng.');
        }
        $new_user->email=strtolower(trim(strip_tags($request['email'])));
        $new_user->name=trim(strip_tags($request['name']));
        $new_user->phone=trim(strip_tags($request['phone']));
        $new_user->password=trim(strip_tags(Hash::make($request['password'])));
        $new_user->address=trim(strip_tags($request['address']));
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $new_user->image = '/assets/images/' . $filename; 
        }else{
            echo'Không có hình';
        }
        $new_user->save();
        $id_user=$new_user->id;
        if (auth()->guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = auth()->guard('web')->user();
            event(new Registered($user)); 
            return redirect('/thongbao')->with('thongbao', "Vui lòng kiểm tra email và xác nhận!"); 
        } else {
            return redirect('/thongbao')->with('thongbao', 'Đăng ký không thành công. Vui lòng kiểm tra thông tin và thử lại.');
        }
        
        
    }
    public function profile(){
        $user=Auth::user();
        return view('profile',compact(['user']));
    }
    public function update_in4(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'current_password' => 'nullable|string|min:8',
            'pass1' => 'nullable|string|min:8|same:pass2',
            'pass2' => 'nullable|string|min:8|',
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . Auth::id(),
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải hợp lệ.',
            'email.max' => 'Email không được vượt quá :max ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            
            'current_password.min' => 'Mật khẩu hiện tại phải có ít nhất :min ký tự.',
            
            'pass1.min' => 'Mật khẩu mới phải có ít nhất :min ký tự.',
            'pass1.same' => 'Hai mật khẩu không giống nhau',
            'pass2.min' => 'Mật khẩu xác nhận phải có ít nhất :min ký tự.',
         
            
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là một số.',
            'phone.digits' => 'Số điện thoại phải có đúng :digits chữ số.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
        ]);
        $id = Auth::id();
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $user->image = '/assets/images/' . $filename; 
        } else {
            $user->image = $request->input('hinhcu');
        }
        if ($request->filled('current_password') && $request->filled('pass1')) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('pass1'));
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
            }
        }
        $user->save();
        return redirect('/thongbao')->with('thongbao', 'Đổi thông tin thành công');
    }
    
    public function orders(){
        $id=Auth::user()->id;
        if (is_numeric($id==false)) {
            return redirect()->with("thongbao",'Người dùng không tồn tại:'.$id);
        }else{
            $donhang=DB::table('donhang')
            ->where('id_nd',$id)->get();
        }
        return view('donhang',compact(['donhang']));
    }


    public function detail_od($id_dh = 0){
        if (!is_numeric($id_dh)) {
            return redirect()->back()->with("thongbao", 'Đơn hàng không tồn tại: ' . $id_dh);
        } else {
            $detail_od = DB::table('chitiet')
                ->where('id_dh', $id_dh)
                ->get();
            
            if ($detail_od->isEmpty()) {
                return redirect()->back()->with("thongbao", 'Không có chi tiết đơn hàng cho mã đơn: ' . $id_dh);
            }
        }
        $tongTien=$detail_od->sum('thanh_tien');
        return view('chitietdon', compact('detail_od','tongTien'));
    }
    
    public function complete_od($id_dh=0){
        $complete_od=donhang::find($id_dh);
        $complete_od->trangThai=1;
        $complete_od->thanhToan=1;
        $complete_od->save();
       chitietdonhang::where('id_dh',$id_dh)->update(['thanhToan'=>1]);
        return redirect('/thongbao')->with('thongbao','Bạn đã xác nhận nhận hàng thành công');
    }
    

    public function payment(Request $request){
        $id_nd = Auth::user()->id;
        $cart_check = $request->session()->get('cart_data', []);
        
        if(isset($id_nd) && isset($cart_check) && $id_nd > 0){
            $donhang = new DonHang;
            $donhang->id_nd = $id_nd;
            $donhang->nguoiNhan = $request->input('first_name') . ' ' . $request->input('last_name');
            $donhang->soDienThoai = $request->input('phone');
            $donhang->trangThai = 0;
            $donhang->diaChi = $request->input('home') . ' ' . $request->input('address') . ' ' . $request->input('district') . ' ' . $request->input('province');
            $donhang->ngayMua = now();
            $donhang->maDon = bin2hex(random_bytes(5 / 2));
            
            $paymentMethod = $request->input('payment_method');
            $donhang->hinhThanhToan = $paymentMethod;
            
            if ($paymentMethod === 'bank_transfer') {
                if ($request->hasFile('payment_image')) {
                    $file = $request->file('payment_image');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images'), $fileName);
                    $donhang->hinhThanhToan = '/assets/images/' . $fileName;
                    $donhang->thanhToan=1;
                } else {
                    return redirect()->back()->withErrors(['payment_image' => 'Vui lòng gửi hình ảnh thanh toán.']);
                }
            }
            
            $donhang->ghiChu = $request->input('note');
            $donhang->save();
            $id_dh = $donhang->id_dh;
    
            foreach ($cart_check['cart'] as $item){
                $donhangchitiet = new ChiTietDonHang;
                $donhangchitiet->tongtien = 0;
                $donhangchitiet->id_dh = $id_dh;
                $donhangchitiet->id_sp = $item['id_sp'];
                $donhangchitiet->gia_sp = $item['giaSale'] < 1 ? $item['gia_sp'] : $item['giaSale'];
                $donhangchitiet->ten_sp = $item['ten_sp'];
                $donhangchitiet->hinh = $item['hinh'];
                $donhangchitiet->soLuong = $item['soluong'];
                $donhangchitiet->thanh_tien = $item['thanhtien'];
                $donhangchitiet->tongtien += $item['thanhtien'];
                
                $donhangchitiet->ngayNhan=now();
                $donhangchitiet->save();
    
                $sanpham = SanPham::find($item['id_sp']);
                if ($sanpham) {
                    $sanpham->soLuong -= $item['soluong']; 
                    $sanpham->save();  
                }
            }
            if ($donhang->thanhToan === 1) {
                ChiTietDonHang::where('id_dh', $id_dh)->update(['thanhToan' => 1]);
            }
            $request->session()->forget('cart_data');
            $request->session()->forget('tongsoluong');
    
            return redirect('/thankyou');
        } else {
            return redirect()->back()->withErrors(['cart_check' => 'Bạn chưa mua sản phẩm nào cả']);
        }
    }
   public function rating(Request $request,int $danhgia)
{
    $id_nd = Auth::user()->id;
    $ten_nd = Auth::user()->name;
    $arr = request()->post();
    $id_sp = (Arr::exists($arr, 'id_sp')) ? $arr['id_sp'] : "-1";
    $danhgia = $request->input('rating'); 

    if ($id_sp <= -1) {
        return redirect('/thongbao')->with('thongbao', 'Không biết id sản phẩm');
    }
    if ($danhgia < 1 || $danhgia > 5) {
        return redirect('/thongbao')->with('thongbao', 'Đánh giá không hợp lệ');
    }
    danhGia::insert([
        'id_nd' => $id_nd,
        'ten_nd' => $ten_nd,
        'id_sp' => $id_sp,
        'danhGia' => $danhgia,
        'ngayDang' => now()
    ]);
// Lấy thông tin sản phẩm
$sanpham = sanpham::find($id_sp);
if ($sanpham) {
    $tangDanhGia = $sanpham->danhgia;
    sanpham::where('id_sp', $id_sp)->update([
        'danhgia' => $tangDanhGia + 1 
    ]);
} else {
    return redirect('/thongbao')->with('thongbao', 'Sản phẩm không tồn tại');
}

    return redirect('/thongbao')->with('thongbao', 'Đã đăng đánh giá');
}

    public function feedback(Request $request){
        $feedback=new phanhoi;
        $feedback->id_user=Auth::user()->id;
        $feedback->ho_ten=$request->input('first').' '. $request->input('last');
        $feedback->email=$request->input('email');
        $feedback->loi_nhan=$request->input('message');
        $feedback->ngay_gui=Carbon::now();
        $feedback->save();
        return redirect('/thongbao')->with('thongbao','Phản hồi của bạn đã được chúng tôi ghi nhận');
    }
    
}
