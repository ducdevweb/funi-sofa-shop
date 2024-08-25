<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

Paginator::useBootstrap();
class AdminSanpham extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $perpage =4;
        $sanpham_arr = sanpham::orderBy('id_sp','desc')
        ->paginate($perpage)->withQueryString();
        return view('admin.danh_sach_sp',compact(['sanpham_arr']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $nsx_arr=DB::table('nsx')->orderBy('thuTu')->get();
       $loai_arr=DB::table('loai_sp')->get();
       return view('admin.san_pham_them',compact('nsx_arr','loai_arr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $them = new sanpham;
        $them->ten_sp = $request->input('ten');
        $them->ngayDang = $request->input('ngayDang');
        $them->gia_sp = (int)$request->input('gia');
        $them->giaSale = (int)$request->input('gia_km ');
        $them->loai_go = $request->input('loai_go');
        $them->mau_sac = $request->input('mau_sac');
        $them->kich_thuoc = $request->input('kich_thuoc');
        $them->id_nsx = (int)$request->input('nsx');
        $them->bao_hanh = $request->input('bao_hanh');
        $them->moTa = $request->input('moTa');

            if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $them->hinh = '/assets/images/' . $filename; 
        }else{
            echo'Không có hình';
        }

        
      
        $them->id_loaisp = $request->input('loai_sp');
        $them->anHien = $request->input('anHien');
        $them->hot = $request->input('hot');
        $them->soLuong = (int)$request->input('soLuong');
        $them->save();
    
        return redirect()->route('sanpham.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id_sp)
    {
       $sp=sanpham::where('id_sp',$id_sp)->first();
       if($sp==null){
        $request->session()->flash('/thongbao_ad','Không có sản phẩm này trong mục');
        return redirect('admin.danh_sach_sp');
       }
       $nsx_arr=DB::table('nsx')->get();
       $loai_arr=DB::table('loai_sp')->get();
       return view('admin.sanpham_chinh',compact(['sp','nsx_arr','loai_arr']));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_sp) {
        $sua = sanpham::find($id_sp);
    
        if (!$sua) {
            return redirect()->back()->with('thongbao', 'Sản phẩm không tồn tại');
        }
    
        $sua->ten_sp = $request->input('ten_sp');
        $sua->ngayDang = $request->input('ngayDang');
        $sua->gia_sp = (int)$request->input('gia_sp');
        $sua->giaSale = (int)$request->input('giaSale');
        $sua->id_loaisp = $request->input('id_loaisp');
        $sua->moTa = $request->input('moTa');
        $sua->anHien = $request->input('anHien');
        $sua->hot = $request->input('hot');
        $sua->id_nsx=$request->input('nsx');
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $sua->hinh = '/assets/images/' . $filename; 
        } else {
            $sua->hinh = $request->input('hinhcu');
        }
    
        $sua->save();
    
        return redirect(route('sanpham.index'))->with('thongbao', 'Cập nhật thành công');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id_sp)
    {
        $xoa_sp = sanpham::where('id_sp', $id_sp)->exists();
        if ($xoa_sp == false) {
            $request->session()->flash('thongbao_ad', "Sản phẩm không tồn tại");
            return redirect()->route('sanpham.index');
        }
        sanpham::where('id_sp', $id_sp)->delete();
        $request->session()->flash('thongbao_ad', "Đã xóa sản phẩm");
        return redirect()->route('sanpham.index');
    }
    
}
