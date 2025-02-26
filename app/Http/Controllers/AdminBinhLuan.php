<?php

namespace App\Http\Controllers;

use App\Models\binhluan;
use App\Models\phanhoi_bl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminBinhLuan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
        $query = binhluan::query();

        switch ($filter) {
            case 'replied': 
                $query->where('da_rep', 1);
                break;

            case 'unreplied': 
                $query->where('da_rep', 0);
                break;

            case 'all':
            default: 
                break;
        }

        if ($ngay_from) {
            $query->whereDate('ngayDang', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereDate('ngayDang', '<=', $ngay_to);
        }

        $binhluan_arr = $query->with('phanhois')->get();
        
        return response()->json($binhluan_arr);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $phanhoi = new phanhoi_bl();
        $phanhoi->phanhoi = $request->input('phanhoi');
        $phanhoi->ten_nd = Auth::guard('sanctum')->user()->name;
        $phanhoi->id_bl = $request->input('id_bl');
        $phanhoi->id_nd = Auth::guard('sanctum')->user()->id;
        $phanhoi->ngayDang = Carbon::now();
        $phanhoi->save();

        $rep = binhluan::find($request->input('id_bl'));
        if ($rep) {
            $rep->da_rep = 1;
            $rep->save();
        }

        return response()->json(['message' => 'Đã trả lời bình luận', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $star)
    {
        $count_star = []; 
        for ($i = 1; $i <= 5; $i++) {
            $count_star[$i] = DB::table('binhluan')->where('danhgia', $i)->count();
        }

        $danhgia = binhluan::with('phanhois');
        switch ($star) {
            case 1:
                $binhluans = $danhgia->where('danhgia', 1)->get();
                break;
            case 2:
                $binhluans = $danhgia->where('danhgia', 2)->get();
                break;
            case 3:
                $binhluans = $danhgia->where('danhgia', 3)->get();
                break;
            case 4:
                $binhluans = $danhgia->where('danhgia', 4)->get();
                break;
            case 5:
                $binhluans = $danhgia->where('danhgia', 5)->get();
                break;
            default:
                $binhluans = $danhgia->get();
                break;
        }

        return response()->json(['binhluans' => $binhluans, 'count_star' => $count_star]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id_bl)
    {
        $xoa_bl = binhluan::where('id_bl', $id_bl)->exists();
        if (!$xoa_bl) {
            return response()->json(['message' => 'Bình luận không tồn tại', 'status' => 'error'], 404);
        }

        binhluan::where('id_bl', $id_bl)->delete();
        return response()->json(['message' => 'Đã xóa bình luận', 'status' => 'success']);
    }
}
