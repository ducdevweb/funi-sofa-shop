<?php

namespace App\Http\Controllers;

use App\Models\loai; // Model loai được dùng cho bảng nhà sản xuất
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminNhaSanXuat extends Controller
{
    /**
     * API để lấy danh sách nhà sản xuất.
     */
    public function index(Request $request)
    {
        $query = loai::query(); 
        if ($request->has('search') && $request->input('search') !== '') {
            $query->where('ten_nsx', 'like', '%' . $request->input('search') . '%');
        }
        $nsx_arr = $query->orderByDesc('thuTu')->get();

        return response()->json($nsx_arr);
    }

    /**
     * API để tạo một nhà sản xuất mới.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ten_nsx' => 'required|string|max:255',
            'thu_tu' => 'required|integer',
            'an_hien' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $them = new loai();
        $them->ten_nsx = $request->input('ten_nsx');
        $them->thuTu = $request->input('thu_tu');
        $them->anHien = $request->input('an_hien');
        $them->save();

        return response()->json($them, 201);
    }

    /**
     * API để lấy thông tin nhà sản xuất theo ID.
     */
    public function show($id_nsx)
    {
        $nhasanxuat = loai::find($id_nsx);
        if (!$nhasanxuat) {
            return response()->json(['message' => 'Nhà sản xuất không tồn tại!'], 404);
        }

        return response()->json($nhasanxuat);
    }

    /**
     * API để cập nhật thông tin nhà sản xuất theo ID.
     */
    public function update(Request $request, $id_nsx)
    {
        $validator = Validator::make($request->all(), [
            'ten_nsx' => 'required|string|max:255',
            'thu_tu' => 'required|integer',
            'an_hien' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $nhasanxuat = loai::find($id_nsx);
        if (!$nhasanxuat) {
            return response()->json(['message' => 'Nhà sản xuất không tồn tại!'], 404);
        }

        $nhasanxuat->ten_nsx = $request->input('ten_nsx');
        $nhasanxuat->thuTu = $request->input('thu_tu');
        $nhasanxuat->anHien = $request->input('an_hien');
        $nhasanxuat->save();

        return response()->json($nhasanxuat);
    }

    /**
     * API để xóa nhà sản xuất theo ID.
     */
    public function destroy($id_nsx)
    {
        $nhasanxuat = loai::find($id_nsx);
        if (!$nhasanxuat) {
            return response()->json(['message' => 'Nhà sản xuất không tồn tại!'], 404);
        }

        $nhasanxuat->delete();

        return response()->json(['message' => 'Nhà sản xuất đã được xóa.'], 200);
    }
}
