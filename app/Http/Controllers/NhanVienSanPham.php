<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NhanVienSanPham extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sanpham_arr = sanpham::with(['danhmuc', 'nsx'])->orderByDesc('id_sp')->get();
        $timkiem = sanpham::where('ten_sp', 'like', '%' . $request->input('search') . '%')
            ->with(['danhmuc', 'nsx'])->get();
        $dem_sp = sanpham::with(['danhmuc', 'nsx'])
            ->select('id_loaisp', DB::raw('count(*) as total'))
            ->groupBy('id_loaisp')->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'sanpham_arr' => $sanpham_arr,
            'timkiem' => $timkiem,
            'dem_sp' => $dem_sp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $them = new SanPham();
         $them->ten_sp = $request->input('ten');
         $them->ngayDang = Carbon::now();
         $them->gia_sp = (int)$request->input('gia');
         $them->giaSale = (int)$request->input('gia_km');
         $them->loai_go = $request->input('loai_go');
         $them->mau_sac = $request->input('mau_sac');
         $them->kich_thuoc = $request->input('kich_thuoc');
         $them->id_nsx = (int)$request->input('nsx');
         $them->bao_hanh = $request->input('bao_hanh');
         $them->moTa = $request->input('moTa');
         $them->thong_tin = $request->input('thong_tin');

         // Xử lý hình ảnh với if
         if ($request->has('hinh') && $request->input('hinh') != '') {
             $imageData = $request->input('hinh');
             $image = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData));
             $filename = uniqid('hinh_', true) . '.png';
             $path = public_path('sp_img/' . $filename);
             file_put_contents($path, $image);
             $them->hinh = '/sp_img/' . $filename;
         } else {
             $them->hinh = $request->input('hinhcu');
         }

         if ($request->has('hinh_1') && $request->input('hinh_1') != '') {
             $imageData1 = $request->input('hinh_1');
             $image1 = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData1));
             $filename1 = uniqid('hinh_1_', true) . '.png';
             $path1 = public_path('sp_img/' . $filename1);
             file_put_contents($path1, $image1);
             $them->hinh_1 = '/sp_img/' . $filename1;
         } else {
             $them->hinh_1 = $request->input('hinh_1cu');
         }

         if ($request->has('hinh_2') && $request->input('hinh_2') != '') {
             $imageData2 = $request->input('hinh_2');
             $image2 = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData2));
             $filename2 = uniqid('hinh_2_', true) . '.png';
             $path2 = public_path('sp_img/' . $filename2);
             file_put_contents($path2, $image2);
             $them->hinh_2 = '/sp_img/' . $filename2;
         } else {
             $them->hinh_2 = $request->input('hinh_2cu');
         }

         $them->id_loaisp = $request->input('loai_sp');
         $them->anHien = $request->input('anHien');
         $them->hot = $request->input('hot');
         $them->soLuong = (int)$request->input('soLuong');
         $them->save();

         return response()->json(['message' => 'Đã thêm sản phẩm vào cửa hàng']);
     }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, String $id_sp)
    {
        $sanpham = DB::table('sanpham')->where('id_sp', $id_sp)->first();
        if (!is_numeric($id_sp)) {
            return response()->json(['message' => 'Sản phẩm không tồn tại: ' . $id_sp], 404);
        }

        return response()->json($sanpham);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id_sp)
    {
        $sp = sanpham::where('id_sp', $id_sp)->first();
        if ($sp == null) {
            return response()->json(['message' => 'Không có sản phẩm này trong mục'], 404);
        }

        $nsx_arr = DB::table('nsx')->get();
        $loai_arr = DB::table('loai_sp')->get();

        return response()->json([
            'sp' => $sp,
            'nsx_arr' => $nsx_arr,
            'loai_arr' => $loai_arr
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_sp)
    {
        $sua = sanpham::find($id_sp);

        if (!$sua) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $sua->ten_sp = $request->input('ten_sp');
        $sua->ngayDang = $request->input('ngayDang');
        $sua->gia_sp = (float)$request->input('gia_sp');
        $sua->giaSale = (float)$request->input('giaSale');
        $sua->id_loaisp = $request->input('id_loaisp');
        $sua->id_nsx = $request->input('id_nsx');
        $sua->moTa = $request->input('moTa');
        $sua->anHien = $request->input('anHien');
        $sua->hot = $request->input('hot');
        $sua->thong_tin = $request->input('thong_tin');
        $sua->soLuong = $request->input('soLuong');
        $sua->luot_mua = $request->input('luot_mua');
        $sua->luotXem = $request->input('luotXem');
        $sua->loai_go = $request->input('loai_go');
        $sua->kich_thuoc = $request->input('kich_thuoc');
        $sua->mau_sac = $request->input('mau_sac');
        $sua->bao_hanh = $request->input('bao_hanh');

        if ($request->has('hinh') && $request->input('hinh') != '') {
            $imageData = $request->input('hinh');
            $image = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData));
            $filename = uniqid('img_', true) . '.png';

            $path = public_path('sp_img/' . $filename);
            file_put_contents($path, $image);
            $sua->hinh = '/sp_img/' . $filename;
        } else {
            $sua->hinh = $request->input('hinhcu');
        }

        if ($request->has('hinh_1') && $request->input('hinh_1') != '') {
            $imageData_1 = $request->input('hinh_1');
            $image_1 = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData_1));
            $filename_1 = uniqid('img_', true) . '_1.png';
            $path_1 = public_path('sp_img/' . $filename_1);
            file_put_contents($path_1, $image_1);
            $sua->hinh_1 = '/sp_img/' . $filename_1;
        } else {
            $sua->hinh_1 = $request->input('hinhcu_1');
        }
        if ($request->has('hinh_2') && $request->input('hinh_2') != '') {
            $imageData_2 = $request->input('hinh_2');
            $image_2 = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $imageData_2));
            $filename_2 = uniqid('img_', true) . '_2.png';
            $path_2 = public_path('sp_img/' . $filename_2);
            file_put_contents($path_2, $image_2);
            $sua->hinh_2 = '/sp_img/' . $filename_2;
        } else {
            $sua->hinh_2 = $request->input('hinhcu_2');
        }


        $sua->save();

        return response()->json(['message' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id_sp)
    {
        $sp = sanpham::where('id_sp', $id_sp)->exists();
        if ($sp === false) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        sanpham::where('id_sp', $id_sp)->delete();
        return response()->json(['message' => 'Đã xóa sản phẩm']);
    }

    public function sp_nsx($id_nsx = 0)
    {
        if (!is_numeric($id_nsx)) {
            return response()->json(['message' => 'Nhà sản xuất này không tồn tại: ' . $id_nsx], 404);
        }

        $sp_nsx = sanpham::where('id_nsx', $id_nsx)->get();
        return response()->json(['sp_nsx' => $sp_nsx]);
    }
    public function sp_danhmuc($id_loaisp = 0)
    {
        if (!is_numeric($id_loaisp)) {
            return response()->json(['message'=>'Danh mục không tồn tại'.$id_loaisp]);
        }
      $list_sp=sanpham::where('id_loaisp',$id_loaisp)->with(['danhmuc','nsx'])->get();
      $dem_sp = sanpham::with(['danhmuc', 'nsx'])
      ->select('id_loaisp', DB::raw('count(*) as total'))
      ->groupBy('id_loaisp')->get();
        return response()->json(['dem_sp'=>$dem_sp,'list_sp'=>$list_sp]);
    }
    
}
