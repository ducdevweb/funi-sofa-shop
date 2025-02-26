<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVoucher extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $query = DB::table('voucher');
        
        switch ($filter) {
            case 'expired':
                $query->where('ngay_het_han', '<', Carbon::now());
                break;
            case 'used':
                $query->whereColumn('da_su_dung', '>=', 'gioi_han_su_dung');
                break;
            case 'hidden':
                $query->where('an_hien', 0);
                break;
            case 'search':
                $query->where('ma_giam_gia', 'like', '%' . $request->input('search') . '%');
                break;
            case 'available':
            default:
                // No filter applied
                break;
        }

        $voucher_arr = $query->get();

        // Additional statistics
        $voucher_statistics = [
            'expired' => DB::table('voucher')->where('ngay_het_han', '<=', Carbon::now())->count(),
            'hidden' => DB::table('voucher')->where('an_hien', 0)->count(),
            'used' => DB::table('voucher')->whereColumn('da_su_dung', '>=', 'gioi_han_su_dung')->count(),
            'existing' => DB::table('voucher')->where('an_hien', 1)->count(),
        ];

        return response()->json([
            'vouchers' => $voucher_arr,
            'statistics' => $voucher_statistics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ma_giam_gia' => 'required|string|max:255|unique:voucher,ma_giam_gia',
            'so_tien_giam' => 'required|numeric',
            'gioi_han_su_dung' => 'required|integer',
            'ngay_bat_dau' => 'required|date',
            'ngay_het_han' => 'required|date|after_or_equal:ngay_bat_dau',
            'an_hien' => 'required|boolean',
        ]);

        $voucher = new voucher();
        $voucher->ma_giam_gia = $request->input('ma_giam_gia');
        $voucher->so_tien_giam = $request->input('so_tien_giam');
        $voucher->gioi_han_su_dung = $request->input('gioi_han_su_dung');
        $voucher->ngay_bat_dau = $request->input('ngay_bat_dau');
        $voucher->ngay_het_han = $request->input('ngay_het_han');
        $voucher->an_hien = $request->input('an_hien');
        $voucher->save();

        return response()->json(['message' => 'Đã thêm mã giảm giá', 'voucher' => $voucher], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voucher = voucher::find($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher không tồn tại'], 404);
        }

        return response()->json($voucher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $voucher = voucher::find($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher không tồn tại'], 404);
        }

        $voucher->update($request->all());

        return response()->json(['message' => 'Voucher đã được cập nhật thành công', 'voucher' => $voucher]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $voucher = voucher::find($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher này không tồn tại'], 404);
        }

        $voucher->delete();
        return response()->json(['message' => 'Đã xóa mã giảm giá']);
    }
}
