<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDoanhThu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
     $ngay_from = $request->input('ngay_from');
    $ngay_to = $request->input('ngay_to');
    $filter = $request->input('filter');

    $query = DB::table('chitiet')
        ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
        ->select(
            'sanpham.ten_sp', 
            'sanpham.hinh', 
            'chitiet.gia_sp', 
            DB::raw('SUM(chitiet.soLuong) as soLuong'), 
            DB::raw('SUM(chitiet.tongTien) as thanh_tien'),
            DB::raw('CASE 
                WHEN sanpham.giaSale IS NOT NULL AND sanpham.giaSale < chitiet.gia_sp THEN sanpham.giaSale 
                ELSE chitiet.gia_sp 
            END as final_price')
        );

    switch ($filter) {
        case 'unfinished':
            $query->where('chitiet.thanhToan', 0);
            break;
        case 'complete':
            $query->where('chitiet.thanhToan', 1);
            break;
        case 'total':
        default:
            break;
    }

    if ($ngay_from) {
        $query->whereDate('chitiet.ngayNhan', '>=', $ngay_from);
    }
    if ($ngay_to) {
        $query->whereDate('chitiet.ngayNhan', '<=', $ngay_to);
    }

    $query->groupBy('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', 'chitiet.id_sp','sanpham.giaSale');

    $doanhthu = $query->get();
    
    $tongdoanhthu = 0;
    foreach ($doanhthu as $item) {
        $tongdoanhthu += $item->soLuong * $item->final_price;
    }

    return response()->json([
        'doanhthu' => $doanhthu,
        'tongdoanhthu' => $tongdoanhthu
    ]);
    }

    public function update(Request $request, $id_dh = 0)
    {
        $chitiets = chitietdonhang::where('id_dh', $id_dh)->get(); 
        if ($chitiets->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy chi tiết đơn hàng.'
            ], 404);
        }   
        foreach ($chitiets as $chitiet) {
            $chitiet->thanhToan = 1; 
            $chitiet->save(); 
        }
    
        // Trả về phản hồi JSON với thông báo thành công
        return response()->json([
            'status' => 'success',
            'message' => 'Xác nhận thanh toán thành công'
        ]);
    }


    public function exportPdf(Request $request)
        {
            $ngay_from = $request->input('ngay_from');
            $ngay_to = $request->input('ngay_to');
            $filter = $request->input('filter');
            $query = DB::table('chitiet')
                ->join('sanpham', 'chitiet.id_sp', '=', 'sanpham.id_sp')
                ->select(
                    'sanpham.ten_sp', 
                    'sanpham.hinh', 
                    'chitiet.gia_sp', 
                    DB::raw('SUM(chitiet.soLuong) as soLuong'), 
                    DB::raw('SUM(chitiet.tongTien) as thanh_tien'),
                    DB::raw('CASE 
                        WHEN sanpham.giaSale IS NOT NULL AND sanpham.giaSale < chitiet.gia_sp THEN sanpham.giaSale 
                        ELSE chitiet.gia_sp 
                    END as final_price')
                );
            switch ($filter) {
                case 'unfinished':
                    $query->where('chitiet.thanhToan', 0);
                    break;
                case 'complete':
                    $query->where('chitiet.thanhToan', 1);
                    break;
            }
            if ($ngay_from) {
                $query->whereDate('chitiet.ngayNhan', '>=', $ngay_from);
            }
            if ($ngay_to) {
                $query->whereDate('chitiet.ngayNhan', '<=', $ngay_to);
            }
            $query->groupBy('sanpham.ten_sp', 'sanpham.hinh', 'chitiet.gia_sp', 'chitiet.id_sp','sanpham.giaSale');
            $doanhthu = $query->get();
            $tongdoanhthu = 0;
            foreach ($doanhthu as $item) {
                $tongdoanhthu += $item->soLuong * $item->final_price;
            }
            
        
            $pdf = Pdf::loadView('admin.doanhthu_pdf', compact('doanhthu', 'tongdoanhthu', 'ngay_from', 'ngay_to'));
        
            return $pdf->download('bao-cao-doanh-thu.pdf');
    }

  
}
