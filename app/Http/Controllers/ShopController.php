<?php

namespace App\Http\Controllers;

use App\Models\binhluan;
use App\Models\phanhoi;
use App\Models\sanpham;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $sp_sale = sanpham::with(['danhmuc', 'binhluans'])->whereNotNull('giaSale')->orderByDesc(DB::raw('giaSale-gia_sp'))->limit(6)->get();
        $sp_new = sanpham::with(['danhmuc', 'binhluans'])->orderByDesc('ngayDang')->limit(6)->get();
        $sp_hot = sanpham::with(['danhmuc', 'binhluans'])->orderByDesc('luot_mua')->limit(6)->get();
        return response()->json([
            'sp_sale' => $sp_sale,
            'sp_new' => $sp_new,
            'sp_hot' => $sp_hot
        ]);
    }
    public function detail($id_sp = 0)
    {
        if (!is_numeric($id_sp)) {
            return response()->json(['error' => 'Sản phẩm này không tồn tại'], 400);
        }
        $detail = sanpham::with(['danhmuc', 'binhluans'])->where('id_sp', $id_sp)->first();

        if (!$detail) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }
        $id_loaisp = $detail->id_loaisp;
        $sp_relate = sanpham::with(['danhmuc', 'binhluans'])->where('id_loaisp', $id_loaisp)->limit(6)->orderByDesc('luot_mua')->get();
        $binhluans = binhluan::where('id_sp', $id_sp)->get();
        return response()->json([
            'detail' => $detail,
            'sp_relate' => $sp_relate,
            'binhluans' => $binhluans,
        ], 200);
    }

    public function them(Request $request)
    {
        $validatedData = $request->validate([
            'noiDung' => 'required|string|max:255',
            'danhgia' => 'required|integer|min:1|max:5',
            'id_sp' => 'required|exists:sanpham,id_sp'
        ]);

        if (!Auth::check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để bình luận.'], 401);
        }

        $binhluan = new BinhLuan();
        $binhluan->id_sp = $validatedData['id_sp'];
        $binhluan->id_nd = Auth::id();
        $binhluan->ten_nd = Auth::user()->name;
        if ($request->hasFile('hinh_bl')) {
            $file = $request->file('hinh_bl');
            $imagePath = $file->store('binhluan_img', 'public'); 
        
            $binhluan->hinh_bl = '/storage/' . $imagePath;
        }
        
        
        $binhluan->noiDung = $validatedData['noiDung'];
        $binhluan->danhgia = $validatedData['danhgia'];
        $binhluan->ngayDang=Carbon::now();
        $binhluan->save();
        return response()->json([
            'message' => 'Bình luận đã được thêm thành công!',
            'binhluan' => $binhluan
        ], 201);
    }


    public function sua($id_bl)
    {
        $binhluan = binhluan::findOrFail($id_bl);
        if ($binhluan->id_nd !== Auth::id()) {
            return response()->json(['error' => 'Không có quyền chỉnh sửa bình luận này.'], 403);
        }

        $id_sp = $binhluan->id_sp;
        $detail = sanpham::findOrFail($id_sp);
        return response()->json([
            'binhluan' => $binhluan,
            'id_sp' => $id_sp,
            'detail' => $detail,
        ], 201);
    }

    public function capnhat(Request $request, $id_bl)
    {
        $validatedData = $request->validate([
            'noiDung' => 'required|string|max:255',
            'danhgia' => 'required|integer|min:1|max:5',
        ]);

        $binhluan = binhluan::findOrFail($id_bl);
        if ($binhluan->id_nd !== Auth::id()) {
            return response()->json(['error' => 'Không có quyền chỉnh sửa bình luận này.'], 403);
        }

        $binhluan->noiDung = $validatedData['noiDung'];
        $binhluan->danhgia = $validatedData['danhgia'];

        $binhluan->save();
        return response()->json([
            'message' => 'Cập nhật bình luận thành công!',
            'binhluan' => $binhluan
        ], 200);
    }

    public function xoa($id_bl)
    {
        $binhluan = binhluan::findOrFail($id_bl);
        if ($binhluan->id_nd !== Auth::id()) {
            return response()->json(['error' => 'Không có quyền xóa bình luận này.'], 403);
        }
        $binhluan->delete();
        return response()->json([
            'message' => 'Bình luận đã được xóa thành công!'
        ], 200);
    }



    public function phanhoi(Request $request)
    {


        $phanHoi = new phanhoi();
        $phanHoi->id_user = 0;
        $phanHoi->ho_ten = $request->input('name');
        $phanHoi->email = $request->input('email');
        $phanHoi->loi_nhan = $request->input('message');
        $phanHoi->ngay_gui = now();
        if (!filter_var($phanHoi->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Địa chỉ email không hợp lệ.',
            ], 400);
        }
        $phanHoi->save();
        return response()->json([
            'message' => 'Phản hồi của bạn đã được gửi thành công!',
            'data' => $phanHoi
        ], 201);
    }

    public function yeuthich()
    {
        $yeuThich = session()->get('yeuThich', []);

        return response()->json([
            'yeuthich' => $yeuThich
        ]);
    }

    public function themYeuThich($id_sp)
    {
        $sanpham = sanpham::find($id_sp);
        if (!$sanpham) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }
        $yeuThich = session()->get('yeuThich', []);
        if (!isset($yeuThich[$id_sp])) {
            $yeuThich[$id_sp] = [
                'id_sp' => $sanpham->id_sp,
                'hinh' => $sanpham->hinh,
                'ten_sp' => $sanpham->ten_sp,
                'gia_sp' => $sanpham->gia_sp,
                'giaSale' => $sanpham->giaSale,
                'danhgia' => $sanpham->binhluans->avg('danhgia') ?: 0,
                'luot_mua' => $sanpham->luot_mua,
                'danhmuc' => $sanpham->danhmuc->loai ?? 'Chưa có danh mục',
            ];

            session(['yeuThich' => $yeuThich]);

            return response()->json(['success' => 'Sản phẩm đã được thêm vào yêu thích', 'yeuthich' => $yeuThich], 200);
        }

        return response()->json(['info' => 'Sản phẩm đã có trong danh sách yêu thích', 'yeuthich' => $yeuThich], 200);
    }

    public function xoaYeuThich($id_sp)
    {
        $yeuThich = session()->get('yeuThich', []);
        if (isset($yeuThich[$id_sp])) {
            unset($yeuThich[$id_sp]);
            session()->put('yeuThich', $yeuThich);

            return response()->json(['success' => 'Sản phẩm đã được xóa khỏi yêu thích', 'yeuthich' => $yeuThich], 200);
        }

        return response()->json(['error' => 'Sản phẩm không có trong danh sách yêu thích'], 404);
    }



    public function product(Request $request)
    {
        $query = sanpham::with(['danhmuc', 'binhluans']);
        $id_nsx = $request->query('id_nsx');
        $id_loaisp = $request->query('id_loaisp');
        $search = $request->input('search');
        $action = $request->input('action');

        if ($id_nsx) {
            $query->where('id_nsx', $id_nsx);
        }

        if ($id_loaisp) {
            $query->where('id_loaisp', $id_loaisp);
        }
        if ($search) {
            $query->where('ten_sp', 'like', '%' . $search . '%')->get();
        }

        switch ($action) {
            case 'hot':
                $query->where('hot', 1);
                break;
            case 'asc':
                $query->orderBy('gia_sp', 'asc');
                break;
            case 'desc':
                $query->orderByDesc('gia_sp');
                break;
            case 'new':
                $query->orderByDesc('ngayDang');
                break;
            case 'best':
                $query->whereNotNull('giaSale')->orderByDesc('giaSale');
                break;
            case 'under500000':
                $query->where('gia_sp', '<', 500000)->orderByDesc('gia_sp');
                break;
            case '500000-1000000':
                $query->where('gia_sp', '>=', 500000)
                    ->where('gia_sp', '<=', 1000000)->orderByDesc('gia_sp');
                break;
            case '1000000-1500000':
                $query->where('gia_sp', '>=', 1000000)
                    ->where('gia_sp', '<=', 1500000)->orderByDesc('gia_sp');
                break;
            case '2000000-5000000':
                $query->where('gia_sp', '>=', 2000000)
                    ->where('gia_sp', '<=', 5000000)->orderByDesc('gia_sp');
                break;
            case 'above5000000':
                $query->where('gia_sp', '>', 5000000)->orderByDesc('gia_sp');
                break;
            default:
                $query->orderByDesc('luotXem');
                break;
        }

        $sanpham_arr = $query->paginate(100);

        return response()->json($sanpham_arr);
    }

    public function article()
    {
        $article_arr = DB::table('baiviet')->orderByDesc('ngay_dang')->limit(10)->get();
        return response()->json($article_arr);
    }
    public function detail_article($id_bv = 0)
    {
        if (is_numeric($id_bv) === false) {
            return redirect()->back()->with('thongbao_ad', 'Không có bài viết này');
        }
        $article_arr = DB::table('baiviet')->orderByDesc('ngay_dang')->limit(10)->get();
        $article_ct = DB::table('baiviet')->where('id_bv', $id_bv)->first();
        return response()->json([
            'article_ct' => $article_ct,
            'article_arr' => $article_arr
        ]);
    }


    public function voucher()
    {
        $voucher_1 = DB::table('voucher')->where('an_hien', 1)->get();
        $voucher_2 = DB::table('voucher')->where('an_hien', 0)->get();
        return response()->json([
            'voucher_1' => $voucher_1,
            'voucher_2' => $voucher_2
        ]);
    }
    public function updateUsage(Request $request)

    {
        $vouchers = $request->input('vouchers', []);


        foreach ($vouchers as $voucher) {

            $currentVoucher = DB::table('voucher')->where('id_mgg', $voucher['id_mgg'])->first();

            if ($currentVoucher) {

                $newLimit = $currentVoucher->gioi_han_su_dung - (int)$voucher['used_count'];

                $newLimit = max(0, $newLimit);

                DB::table('voucher')->where('id_mgg', $voucher['id_mgg'])->update([

                    'gioi_han_su_dung' => $newLimit

                ]);
            }
        }


        return response()->json(['message' => 'Voucher usage updated successfully'], 200);
    }
}
