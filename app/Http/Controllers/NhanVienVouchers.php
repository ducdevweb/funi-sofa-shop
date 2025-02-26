<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienVouchers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $query = DB::table('voucher'); 
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');

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
                break; 
        }

        $voucher_counts = [
            'expired' => DB::table('voucher')->where('ngay_het_han', '<=', Carbon::now())->count(),
            'hidden' => DB::table('voucher')->where('an_hien', 0)->count(), 
            'used' => DB::table('voucher')->whereColumn('da_su_dung', '>=', 'gioi_han_su_dung')->count(),
            'existing' => DB::table('voucher')->where('an_hien', 1)->count(),
        ];
        if ($ngay_from) {
            $query->whereTime('ngay_bat_dau', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereTime('ngay_het_han', '<=', $ngay_to);
        }
        $voucher_arr = $query->get();

        return response()->json([
            'vouchers' => $voucher_arr,
            'counts' => $voucher_counts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ma_giam_gia' => 'required|string',
            'so_tien_giam' => 'required|numeric',
            'gioi_han_su_dung' => 'required|numeric',
            'ngay_bat_dau' => 'required|date',
            'ngay_het_han' => 'required|date|after_or_equal:ngay_bat_dau',
            'an_hien' => 'required|boolean',
        ]);

        $voucher = new voucher(); 
        $voucher->fill($request->all());
        $voucher->save();

        return response()->json(['message' => 'Voucher added successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voucher = voucher::find($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher not found'], 404);
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
            return response()->json(['message' => 'Voucher not found'], 404);
        }

        $voucher->update($request->all());
        return response()->json(['message' => 'Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = voucher::find($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher not found'], 404);
        }

        $voucher->delete();
        return response()->json(['message' => 'Voucher deleted successfully']);
    }
}
