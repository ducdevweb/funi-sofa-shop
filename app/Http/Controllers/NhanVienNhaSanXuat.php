<?php

namespace App\Http\Controllers;

use App\Models\loai; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienNhaSanXuat extends Controller
{
    /**
     * Hiển thị danh sách nhà sản xuất.
     */
    public function index(Request $request)
    {
        $query = DB::table('nsx');
        if ($request->has('search') && $request->input('search') !== '') {
            $query->where('ten_nsx', 'like', '%' . $request->input('search') . '%');
        }
        $nsx_arr = $query->orderByDesc('thuTu')->get();
    
        return response()->json($nsx_arr);
    }
    
    /**
     * Tạo một nhà sản xuất mới.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'ten_nsx' => 'required|string|max:100',
            'thu_tu' => 'required|integer',
            'an_hien' => 'required|boolean',
        ]);

        $them = new loai();
        $them->ten_nsx = $request->input('ten_nsx');
        $them->thuTu = $request->input('thu_tu');
        $them->anHien = $request->input('an_hien');
        $them->save();

        return response()->json(['message' => 'Thêm nhà sản xuất thành công', 'data' => $them], 201);
    }

    /**
     * Hiển thị thông tin nhà sản xuất cụ thể.
     */
    public function show($id_nsx)
    {
        $nhasanxuat = loai::find($id_nsx);
        if (!$nhasanxuat) {
            return response()->json(['error' => 'Nhà sản xuất không tồn tại!'], 404);
        }
        return response()->json($nhasanxuat);
    }

    /**
     * Cập nhật thông tin nhà sản xuất.
     */
    public function update(Request $request, $id_nsx)
    {
        $nhasanxuat = loai::find($id_nsx);
        if (!$nhasanxuat) {
            return response()->json(['error' => 'Nhà sản xuất không tồn tại!'], 404);
        }

        // Validate input
        $request->validate([
            'ten_nsx' => 'required|string|max:100',
            'thu_tu' => 'required|integer',
            'an_hien' => 'required|boolean',
        ]);

        $nhasanxuat->ten_nsx = $request->input('ten_nsx');
        $nhasanxuat->thuTu = $request->input('thu_tu');
        $nhasanxuat->anHien = $request->input('an_hien');
        $nhasanxuat->save();

        return response()->json(['message' => 'Cập nhật nhà sản xuất thành công', 'data' => $nhasanxuat]);
    }

    /**
     * Xóa nhà sản xuất.
     */
    public function destroy($id_nsx)
    {  
        $nhasanxuat = loai::find($id_nsx); 
        if (!$nhasanxuat) {
            return response()->json(['error' => 'Nhà sản xuất không tồn tại!'], 404);
        }

        $nhasanxuat->delete();
        return response()->json(['message' => 'Đã xóa nhà sản xuất']);
    }
}
