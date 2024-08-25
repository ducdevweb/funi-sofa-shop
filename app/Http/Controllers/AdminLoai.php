<?php

namespace App\Http\Controllers;

use App\Models\loai;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

 Paginator::useBootstrap();
class AdminLoai extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prePage=env('PER_PAGE')/2;
        $nsx_arr=loai::orderBy('thuTu','asc')->paginate($prePage)->withQueryString();
        return view('admin.loai_ds',compact(['nsx_arr']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/loai_them");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $them_nsx=new loai;
        $them_nsx->ten_nsx = $request['ten'];
        $them_nsx->anHien = $request['an_hien'];
        $them_nsx->thuTu = $request['thu_tu'];
        $them_nsx->save();
        return redirect()->route('loai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_nsx)
    {
        $loaisp = loai::find($id_nsx);
        return view('admin.loai_chinh', compact('loaisp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  {
        $obj = loai::find($id);
        $obj->ten_nsx = $request['ten_loai'];
        $obj->thuTu = $request['thu_tu'];
        $obj->anHien = $request['an_hien'];
        $obj->save();
        return redirect(route('loai.index'))->with('thongbao', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_nsx)
    {
        $xoa_sp = loai::where('id_nsx', $id_nsx)->exists();
        if ($xoa_sp == false) {
            session()->flash('thongbao_ad', "Loại sản phẩm không tồn tại");
            return redirect()->route('loai.index');
        }
        loai::where('id_nsx', $id_nsx)->delete();
        session()->flash('thongbao_ad', "Đã xóa loại sản phẩm");
        return redirect()->route('loai.index');
    }

}
