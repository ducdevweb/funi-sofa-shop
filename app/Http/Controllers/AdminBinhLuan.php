<?php

namespace App\Http\Controllers;

use App\Models\binhluan;
use App\Models\danhGia;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

Paginator::useBootstrap();
class AdminBinhLuan extends Controller
{
function index(){
    $perpage = 4; 
    
    $sanpham_arr = sanpham::where('binhluan', '>', 0)
                           ->orWhere('danhgia','>',0)
                           ->orderBy('ngayDang', 'desc')
                           ->paginate($perpage)
                           ->withQueryString();
                           
    return view('admin.binhluan_ds', compact('sanpham_arr'));
}
public function chitiet_bl($id_sp = 0)
{
    $sanpham = sanpham::find($id_sp);
    if ($sanpham) {
        $binhluan = DB::table('binhluan')->where('id_sp', $id_sp)->get();
        return view('admin.chitiet_bl', compact('sanpham', 'binhluan'));
    } else {
        return redirect()->route('binhluan.index')->with('thongbao', 'Sản phẩm không tồn tại');
    }
}

public function danhgia_ct($id_sp = 0)
{
    $sanpham = sanpham::find($id_sp);
    if ($sanpham) {
        $danhgia = DB::table('danhgia')->where('id_sp', $id_sp)->get();
        return view('admin.danhgia_ct', compact('sanpham', 'danhgia'));
    } else {
        return redirect()->route('binhluan.index')->with('thongbao', 'Sản phẩm không tồn tại');
    }
}


public function xoa_bl(Request $request, $id_bl = 0)
{
    $xoa_bl = binhluan::where('id_bl', $id_bl)->exists();
    if (!$xoa_bl) {
        $request->session()->flash('thongbao_ad', "Bình luận không tồn tại");
        return redirect()->route('binhluan.index');
    }

    binhluan::where('id_bl', $id_bl)->delete();
    $request->session()->flash('thongbao_ad', "Đã xóa bình luận");
    return redirect()->route('binhluan.index');
}

    public function xoa_dg(Request $request,$id_dg=0){
        $xoa_sp = danhGia::where('id_dg', $id_dg)->exists();
        if ($xoa_sp == false) {
            $request->session()->flash('thongbao_ad', "Đánh giá không tồn tại");
            return redirect()->route('binhluan.index');
        }
        danhGia::where('id_dg', $id_dg)->delete();
        $request->session()->flash('thongbao_ad', "Đã xóa đánh giá");
        return redirect()->route('binhluan.index');
    }
}
