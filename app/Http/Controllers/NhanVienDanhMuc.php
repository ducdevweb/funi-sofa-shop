<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienDanhMuc extends Controller
{
    /**
     * API: Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $query = DB::table('loai_sp');

        if ($search) {
            $query->where('loai', 'LIKE', "%$search%"); 
        }

        $danhmuc_arr = $query->orderByDesc('thu_tu')->get(); 
        return response()->json($danhmuc_arr);
    }
    
    /**
     * API: Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'loai' => 'required|string|max:50',
            'thu_tu' => 'required|integer',
            'hinh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $them = new danhmuc();
        $them->loai = $request->input('loai');
        $them->thu_tu = $request->input('thu_tu');
        
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('danhmuc_img', $filename, 'public');
            $them->hinh = '/danhmuc_img/' . $filename;
        }

        $them->save();

        return response()->json(['message' => 'Danh mục mới đã được thêm!', 'data' => $them]);
    }

    /**
     * API: Show the form for editing the specified resource.
     */
    public function edit($id_loaisp=0)
    {
        $danhmuc = DB::table('loai_sp')->where('id_loaisp', $id_loaisp)->first();
        return response()->json($danhmuc);
    }
    
    /**
     * API: Update the specified resource in storage.
     */
    public function update(Request $request, $id_loaisp = 0)
    {
        // Xác thực dữ liệu
        $request->validate([
            'loai' => 'required|string|max:50',
            'thu_tu' => 'required|integer',
            'hinh' => 'nullable',   
        ]);
    
        // Tìm danh mục cần sửa
        $sua = danhmuc::find($id_loaisp);
    
        if (!$sua) {
            return response()->json(['message' => 'Danh mục không tồn tại!'], 404);
        }
    
        $sua->loai = $request->input('loai');
        $sua->thu_tu = $request->input('thu_tu');
        if ($request->has('hinh')) {
            $hinh = $request->input('hinh');
    
            if (strpos($hinh, 'data:image') === 0) {
                $exploded = explode(',', $hinh);
                $decoded = base64_decode($exploded[1]);
                $extension = str_replace('image/', '', str_replace(';base64', '', $exploded[0]));
                $filename = time() . '.' . $extension;
                file_put_contents(public_path('danhmuc_img/' . $filename), $decoded);
                $sua->hinh = '/danhmuc_img/' . $filename;
            } else if ($request->hasFile('hinh')) {
                $file = $request->file('hinh');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('danhmuc_img'), $filename);
                $sua->hinh = '/danhmuc_img/' . $filename;
            }
        } else if ($request->has('hinhcu')) {
            $sua->hinh = $request->input('hinhcu');
        }
        $sua->save();
        return response()->json([
            'message' => 'Danh mục đã được cập nhật!',
            'data' => $sua
        ]);
    }
    
    /**
     * API: Remove the specified resource from storage.
     */
    public function destroy($id_danhmuc=0)
    {
        $danhmuc = danhmuc::where('id_loaisp', $id_danhmuc)->exists(); 
        if (!$danhmuc) {
            return response()->json(['message' => 'Danh mục không tồn tại'], 404);
        }

        danhmuc::where('id_loaisp', $id_danhmuc)->delete();
        return response()->json(['message' => 'Đã xóa danh mục']);
    }
}
