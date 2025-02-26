<?php

namespace App\Http\Controllers;

use App\Models\phanhoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPhanHoi extends Controller
{
    /**
     * API để lấy danh sách phản hồi.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        
        switch ($filter) {
            case 'total':
                $phanhoi_arr = DB::table('phanhoi')
                    ->orderBy('ngay_gui', 'asc')
                    ->get();
                break;
            case 'available':
                $phanhoi_arr = DB::table('phanhoi')
                    ->where('da_xu_ly', 0) 
                    ->orderBy('ngay_gui', 'asc')
                    ->get();
                break;
            case 'expired':
                $phanhoi_arr = DB::table('phanhoi')
                    ->where('da_xu_ly', 1) 
                    ->orderBy('ngay_gui', 'asc')
                    ->get();
                break;
            case 'search':
                $search = $request->input('search');
                $phanhoi_arr = DB::table('phanhoi')
                    ->where('loi_nhan', 'LIKE', '%' . $search . '%') 
                    ->orderBy('ngay_gui', 'asc')
                    ->get();
                break;
            default:
                $phanhoi_arr = DB::table('phanhoi')
                    ->orderBy('ngay_gui', 'asc')
                    ->get();
                break;
        }

        return response()->json($phanhoi_arr);
    }

    /**
     * API để xử lý phản hồi theo ID.
     */
    public function show(string $id)
    {
      
    }

    /**
     * API để tạo một phản hồi mới.
     */
    public function store(Request $request)
    {
        // Thêm mã cho tạo phản hồi mới nếu cần.
    }

    /**
     * API để cập nhật phản hồi theo ID.
     */
    public function update(Request $request, string $id)
    {
        $ht = phanhoi::find($id);
        if ($ht) {
            $ht->da_xu_ly = 1;
            $ht->save();
            return response()->json(['message' => 'Đã xử lý phản hồi'], 200);
        } else {
            return response()->json(['message' => 'Phản hồi không tồn tại!'], 404);
        }
    }

    /**
     * API để xóa phản hồi theo ID.
     */
    public function destroy(string $id)
    {
        // Thêm mã cho xóa phản hồi nếu cần.
    }
}
