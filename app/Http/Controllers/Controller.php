<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

abstract class Controller
{
    public function getDataForReact()
    {
        $data = [
            'nsx' => DB::table('nsx')->orderBy('thuTu', 'desc')->get(),
            'loai_sp' => DB::table('loai_sp')->orderBy('id_loaisp', 'desc')->get(),
            'user_new' => DB::table('users')->where('role', '!=', 0)->whereMonth('created_at', Carbon::now()->month)->count(),
            'user_blocks' => DB::table('users')->where('status', 1)->count(),
            'user_count' => DB::table('users')->where('role', '!=', 0)->count(),
            'voucher_expired' => DB::table('voucher')->where('ngay_het_han', '<=', Carbon::now())->count(),
            'voucher_hidden' => DB::table('voucher')->where('an_hien', 0)->count(),
            'voucher_used' => DB::table('voucher')->whereColumn('da_su_dung', '>=', 'gioi_han_su_dung')->count(),
            'voucher_existing' => DB::table('voucher')->where('an_hien', 1)->count(),
            'sp_unfinished' => DB::table('chitiet')
                ->where('thanhToan', 0)
                ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
                ->select('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', 
                    DB::raw('SUM(chitiet.soLuong) as soLuong'), DB::raw('SUM(chitiet.tongTien) as thanh_tien'))
                ->count(),
            'sp_complete' => DB::table('chitiet')
                ->where('thanhToan', 1)
                ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
                ->select('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', 
                    DB::raw('SUM(chitiet.soLuong) as soLuong'), DB::raw('SUM(chitiet.tongTien) as thanh_tien'))
                ->count(),
            'order' => DB::table('donhang')->count(),
            'order_comfirm' => DB::table('donhang')->where('trangThai', 0)->count(),
            'order_del' => DB::table('donhang')->where('trangThai', 4)->count(),
            'order_unfinished' => DB::table('donhang')->where('thanhToan', 0)->count(),
            'comment' => DB::table('binhluan')->count(),
            'comment_rep' => DB::table('binhluan')->where('da_rep', 1)->count(),
            'comment_not_answered' => DB::table('binhluan')->where('da_rep', 0)->count(),
            'comment_assess' => DB::table('binhluan')->where('danhgia')->count(),
            'product' => DB::table('sanpham')->count(),
            'baiviet' => DB::table('baiviet')->count(),
            'baiviet_now' => DB::table('baiviet')
                ->where('ngay_dang', '>=', Carbon::now()->startOfDay())
                ->where('ngay_dang', '<=', Carbon::now()->endOfDay())
                ->count(),
            'baiviet_yesterday' => DB::table('baiviet')->whereDate('ngay_dang', Carbon::now()->subDay())->count(),
            'baiviet_month' => DB::table('baiviet')->whereMonth('ngay_dang', Carbon::now()->month)->count(),
        ];

        return response()->json($data);
    }
}
