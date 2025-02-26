<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDonHang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
        $query = DB::table('donhang')->orderByDesc('id_dh');

        switch ($filter) {
            case 'unfinished':
                $query->where('thanhToan', 0);
                break;
            case 'complete':
                $query->where('thanhToan', 1);
                break;
            case 'comfirm':
                $query->where('trangThai', 0);
                break;
            case 'search':
                $query->where('maDon','like','%'.$request->input('search').'%');
                break;
            case 'all':
            default:
                break;
        }

        if ($ngay_from) {
            $query->whereDate('ngayMua', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereDate('ngayMua', '<=', $ngay_to);
        }

        $donhang = $query->get();
        return response()->json($donhang);
    }

    /**
     * API để lấy danh sách đơn hàng cho ReactJS
     */
    public function getDonHang(Request $request)
    {
        $filter = $request->input('filter');
        $ngay_from = $request->input('ngay_from');
        $ngay_to = $request->input('ngay_to');
        $query = DB::table('donhang')->orderByDesc('id_dh');

        switch ($filter) {
            case 'unfinished':
                $query->where('thanhToan', 0);
                break;
            case 'complete':
                $query->where('thanhToan', 1);
                break;
            case 'comfirm':
                $query->where('trangThai', 0);
                break;
            case 'search':
                $query->where('maDon','like','%'.$request->input('search').'%');
                break;
            case 'all':
            default:
                break;
        }

        if ($ngay_from) {
            $query->whereDate('ngayMua', '>=', $ngay_from);
        }
        if ($ngay_to) {
            $query->whereDate('ngayMua', '<=', $ngay_to);
        }

        $donhang = $query->get();
        return response()->json($donhang);
    }

    /**
 * Cập nhật trạng thái của đơn hàng.
 */
public function editTrangThai(Request $request, $id_dh)
{
    if (!is_numeric($id_dh)) {
        return response()->json(['message' => 'ID đơn hàng không hợp lệ.'], 400);
    }
    $newStatus = $request->input('trangThai');
    if (!in_array($newStatus, [0, 1, 2, 3])) {
        return response()->json(['message' => 'Trạng thái không hợp lệ.'], 400);
    }
    $updated = DB::table('donhang')
        ->where('id_dh', $id_dh)
        ->update(['trangThai' => $newStatus]);

    if ($updated) {
        return response()->json(['message' => 'Cập nhật trạng thái thành công.', 'trangThai' => $newStatus], 200);
    } else {
        return response()->json(['message' => 'Cập nhật trạng thái thất bại hoặc không có thay đổi.'], 400);
    }
}

    public function detail_order($id_dh = 0)
    {
        if (!is_numeric($id_dh)) {
            return response()->json(['message' => 'Đơn hàng không tồn tại: ' . $id_dh], 404);
        }

        $detail_od = DB::table('chitiet')->where('id_dh', $id_dh)->get();

        if ($detail_od->isEmpty()) {
            return response()->json(['message' => 'Không có chi tiết đơn hàng cho mã đơn: ' . $id_dh], 404);
        }

        $tongTien = $detail_od->sum('thanh_tien');

        return response()->json(['detail' => $detail_od, 'total' => $tongTien]);
    }

    /**
     * Show order details for ReactJS
     */
    public function show($id_dh = 0)
    {
        if (!is_numeric($id_dh)) {
            return response()->json(['message' => 'Không có đơn hàng này'], 404);
        }

        $details = chitietdonhang::where('id_dh', $id_dh)->with('donhangs')->get();
        return response()->json($details);
    }
}
