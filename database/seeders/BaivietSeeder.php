<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaivietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'tieu_de' => 'Top 10 mẫu bàn console hiện đại, chất lượng, giá tốt năm 2024',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 1',
                'noi_dung' => 'Nội dung chi tiết về mẫu bàn console hiện đại. Đây là mẫu bàn phù hợp cho nhiều không gian sống khác nhau...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Điểm danh 8 mẫu tủ giày thông minh, hiện đại năm 2024',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 2',
                'noi_dung' => 'Bài viết này sẽ giới thiệu về 8 mẫu tủ giày thông minh giúp tiết kiệm không gian và giữ cho ngôi nhà bạn gọn gàng hơn...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => '20 Mẫu tủ bếp nhựa cao cấp, chất lượng cao, giá tốt',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 3',
                'noi_dung' => 'Trong bài viết này, chúng tôi sẽ tổng hợp 20 mẫu tủ bếp nhựa cao cấp với thiết kế đẹp mắt và tính năng vượt trội...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Báo Giá Thi Công Nội Thất Chung Cư Tại Nội Thất MOHO',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 4',
                'noi_dung' => 'Bài viết này sẽ cung cấp thông tin về báo giá thi công nội thất cho chung cư, từ vật liệu đến chi phí...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Top 10 Mẫu Bàn Trà Thông Minh, Thiết Kế Đẹp, Giá Tốt 2024',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 5',
                'noi_dung' => 'Khám phá những mẫu bàn trà thông minh được thiết kế tinh tế và hiện đại, phù hợp cho mọi không gian sống...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => '8 Mẫu Tủ Bếp Đẹp Tại Nội Thất MOHO - Chất Lượng Cao, Ưu Đãi Tốt',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 6',
                'noi_dung' => 'Đánh giá các mẫu tủ bếp đẹp nhất tại Nội Thất MOHO với chất lượng và mức giá ưu đãi...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Thiết Kế Nội Thất Phòng Khách Hiện Đại - Xu Hướng 2024',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 7',
                'noi_dung' => 'Những xu hướng thiết kế nội thất phòng khách hiện đại đang được ưa chuộng trong năm 2024...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Bí Quyết Lựa Chọn Sofa Đẹp Cho Phòng Khách Nhỏ',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 8',
                'noi_dung' => 'Cùng tìm hiểu bí quyết chọn sofa cho phòng khách nhỏ nhưng vẫn đẹp và sang trọng...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Những Mẫu Giường Ngủ Thoải Mái Nhất Năm 2024',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 9',
                'noi_dung' => 'Tổng hợp những mẫu giường ngủ thoải mái nhất, giúp bạn có giấc ngủ sâu và ngon lành...',
                'ngay_dang' => now(),
            ],
            [
                'tieu_de' => 'Xu Hướng Thiết Kế Nội Thất Văn Phòng Hiện Đại',
                'hinh_bv' => 'https://noithatmanhhe.vn/media/11456/p-tho-1-noi-that-manh-he.jpg?width=622.2222222222222&height=700', 
                'id_nd' => rand(1, 5),
                'tac_gia' => 'Tác giả 10',
                'noi_dung' => 'Bài viết này sẽ điểm qua những xu hướng thiết kế nội thất văn phòng hiện đại, tạo không gian làm việc thoải mái...',
                'ngay_dang' => now(),
            ],
        ];

        foreach ($articles as $article) {
            DB::table('baiviet')->insert([
                'tieu_de' => $article['tieu_de'],
                'hinh_bv' => $article['hinh_bv'],
                'id_nd' => $article['id_nd'],
                'tac_gia' => $article['tac_gia'],
                'noi_dung' => $article['noi_dung'],
                'ngay_dang' => $article['ngay_dang'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
