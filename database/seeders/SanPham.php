<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SanPham extends Seeder
{
    /**
     * Run the database seeds.
     */public function run(): void
{
    $sofa_types = [
        'Sofa Chesterfield',
        'Sofa Mid-Century Modern',
        'Sofa Sectional',
        'Sofa Sleeper',
        'Sofa Recliner',
        'Sofa Loveseat',
        'Sofa Chaise',
        'Sofa Camelback',
        'Sofa Lawson',
        'Sofa Tuxedo',
        'Sofa English Roll Arm',
        'Sofa Convertible',
    ];

    $hinh_arr = [
        '/assets/images/img-grid-1.jpg',
        '/assets/images/img-grid-2.jpg',
        '/assets/images/img-grid-3.jpg',
        '/assets/images/post-2.jpg',
        '/assets/images/product-1.png',
        '/assets/images/product-2.png',
        '/assets/images/product-3.png',
        '/assets/images/why-choose-us-img.jpg',
        '/assets/images/sofa.png',
        '/assets/images/sofa.jpg',
        '/assets/images/sofa2.jpg',
        '/assets/images/sofa3.png',
    ];

    $tinhchat_arr = [
        ['loai_go' => 'Gỗ Sồi', 'kich_thuoc' => '100x200', 'mau_sac' => 'Nâu nhạt', 'bao_hanh' => 2],
        ['loai_go' => 'Gỗ Thông', 'kich_thuoc' => '150x250', 'mau_sac' => 'Vàng', 'bao_hanh' => 1],
        ['loai_go' => 'Gỗ Lim', 'kich_thuoc' => '200x300', 'mau_sac' => 'Nâu đậm', 'bao_hanh' => 2],
        ['loai_go' => 'Gỗ Tần Bì', 'kich_thuoc' => '250x350', 'mau_sac' => 'Xanh nhạt', 'bao_hanh' => 3],
        ['loai_go' => 'Gỗ Hương', 'kich_thuoc' => '300x400', 'mau_sac' => 'Đỏ', 'bao_hanh' => 2],
        ['loai_go' => 'Gỗ Gụ', 'kich_thuoc' => '350x450', 'mau_sac' => 'Nâu đỏ', 'bao_hanh' => 1],
        ['loai_go' => 'Gỗ Trắc', 'kich_thuoc' => '400x500', 'mau_sac' => 'Đen', 'bao_hanh' => 2],
        ['loai_go' => 'Gỗ Mun', 'kich_thuoc' => '450x550', 'mau_sac' => 'Đen bóng', 'bao_hanh' => 1],
        ['loai_go' => 'Gỗ Xoan Đào', 'kich_thuoc' => '500x600', 'mau_sac' => 'Hồng nhạt', 'bao_hanh' => 4],
        ['loai_go' => 'Gỗ Căm Xe', 'kich_thuoc' => '550x650', 'mau_sac' => 'Vàng nhạt', 'bao_hanh' => 2],
        ['loai_go' => 'Gỗ Giáng Hương', 'kich_thuoc' => '600x700', 'mau_sac' => 'Nâu sẫm', 'bao_hanh' => 3],
        ['loai_go' => 'Gỗ Đỏ', 'kich_thuoc' => '650x750', 'mau_sac' => 'Đỏ đậm', 'bao_hanh' => 1],
    ];

    for($i = 0; $i < 8; $i++) {
        $ten_sp = array_splice($sofa_types, array_rand($sofa_types), 1)[0];
        $hinh = array_splice($hinh_arr, array_rand($hinh_arr), 1)[0];
        $tinhchat = array_splice($tinhchat_arr, array_rand($tinhchat_arr), 1)[0];
    
        DB::table('sanpham')->insert([
            'id_nsx' => mt_rand(1, 3),
            'id_loaisp' => mt_rand(1, 3),
            'ten_sp' => $ten_sp,
            'gia_sp' => mt_rand(100, 150) * 10000,
            'giaSale' => mt_rand(25, 40) * 20000,
            'hinh' => $hinh,
            'luotXem' => mt_rand(0, 100),
            'hot' => mt_rand(0, 1),
            'ngayDang' => Carbon::now(),
            
            'soLuong' => mt_rand(1, 30),
            'loai_go' => $tinhchat['loai_go'],
            'kich_thuoc' => $tinhchat['kich_thuoc'],
            'mau_sac' => $tinhchat['mau_sac'],
            'bao_hanh' => $tinhchat['bao_hanh'],
            'moTa' => 'Ghế Sofa là một món đồ nội thất quan trọng trong nhiều không gian sống,
                từ phòng khách đến văn phòng làm việc. Với thiết kế đa dạng, ghế sofa không chỉ
                mang lại sự thoải mái mà còn làm tăng tính thẩm mỹ của không gian. Có nhiều loại 
                ghế sofa như Sofa Chesterfield với phong cách cổ điển, Sofa Sectional linh hoạt
                cho phòng lớn, hay Sofa Sleeper đa năng có thể chuyển thành giường. Chất liệu của
                ghế sofa cũng rất phong phú, từ da sang trọng đến nỉ mềm mại, đáp ứng nhu cầu và 
                sở thích cá nhân của mỗi người. Ghế sofa không chỉ là nơi nghỉ ngơi lý tưởng mà còn 
                là điểm nhấn trong thiết kế nội thất.'
        ]);
    }
}    

}
