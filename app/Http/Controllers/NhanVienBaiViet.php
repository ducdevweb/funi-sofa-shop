<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NhanVienBaiViet extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
        $filter = $request->input('filter', 'all');

        $baiviet_arr = DB::table('baiviet');
        switch ($filter) {
            case 'today':
                $baiviet_arr = $baiviet_arr->where('ngay_dang', '>=', Carbon::now()->startOfDay())
                    ->where('ngay_dang', '<=', Carbon::now()->endOfDay());
                break;
            case 'yesterday':
                $baiviet_arr = $baiviet_arr->whereDate('ngay_dang', Carbon::now()->subDay());
                break;
            case 'this_month':
                $baiviet_arr = $baiviet_arr->whereMonth('ngay_dang', Carbon::now()->month);
                break;
            case 'search':
                $baiviet_arr = $baiviet_arr->where('tieu_de', 'like', '%' . $request->input('search') . '%');
                break;
            default:
                break;
        }

        if ($ngay_from) {
            $baiviet_arr->whereDate('ngay_dang', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $baiviet_arr->whereDate('ngay_dang', '<=', $ngay_to);
        }
        
        $baiviet_arr = $baiviet_arr->orderByDesc('ngay_dang')->get();

        return response()->json([
            'data' => $baiviet_arr,
            'filter' => $filter,
            'message' => 'Bài viết retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $them = new BaiViet();
        $them->id_nd = Auth::guard('sanctum')->id();
        
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('baiviet_img', $filename);
            $them->hinh_bv = '/baiviet_img/' . $filename;
        }
        
        $them->tieu_de = $request->input('tieu_de');
        $them->noi_dung = $request->input('noi_dung');
        $them->tac_gia = $request->input('tac_gia');
        $them->ngay_dang = Carbon::now();
        $them->save();

        return response()->json([
            'message' => 'Thêm bài viết thành công',
            'data' => $them
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_bv)
    {
        $baiViet = DB::table('baiviet')->where('id_bv', $id_bv)->first();
        
        if (!$baiViet) {
            return response()->json([
                'message' => 'Bài viết không tồn tại'
            ], 404);
        }

        return response()->json([
            'data' => $baiViet,
            'message' => 'Bài viết retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_bv)
    {
        $sua = BaiViet::find($id_bv);
        
        if (!$sua) {
            return response()->json([
                'message' => 'Bài viết không tồn tại'
            ], 404);
        }
        
        $sua->id_nd = Auth::guard('sanctum')->id();
        
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('baiviet_img', $filename);
            $sua->hinh_bv = '/baiviet_img/' . $filename;
        }

        $sua->tieu_de = $request->input('tieu_de');
        $sua->noi_dung = $request->input('noi_dung');
        $sua->tac_gia = $request->input('tac_gia');
        $sua->ngay_dang = Carbon::now();
        $sua->save();

        return response()->json([
            'message' => 'Sửa bài viết thành công',
            'data' => $sua
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bv)
    {
        $xoa_bl = BaiViet::where('id_bv', $id_bv)->exists();
        
        if (!$xoa_bl) {
            return response()->json([
                'message' => 'Bài viết không tồn tại'
            ], 404);
        }

        BaiViet::where('id_bv', $id_bv)->delete();

        return response()->json([
            'message' => 'Đã xóa Bài viết'
        ]);
    }
}
