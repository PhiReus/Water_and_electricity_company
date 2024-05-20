<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Công trình điện nước Biên Hòa',
                'content' => '
                Sử dụng ràng buộc unique trong cơ sở dữ liệu đảm bảo rằng mỗi giá trị trong cột đó là duy nhất. Tuy nhiên, điều này không thay thế cho việc xác thực (validation) trong ứng dụng của bạn. Mặc dù cơ sở dữ liệu sẽ ngăn chặn các giá trị trùng lặp, bạn vẫn nên sử dụng validation để cung cấp phản hồi người dùng tốt hơn và tránh lỗi không mong muốn trong ứng dụng.',
                'user_id' => 1,
                'category_id' => 1,
            ],
        ]);
    }
}
