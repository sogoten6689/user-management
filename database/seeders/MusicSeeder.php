<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('music')->insert([
            [
                'song_name' => 'Chúa là mục tử tôi',
                'author' => 'Tác giả',
                'first_sentence' => 'Tình thương thiên chúa...',
                'link_pdf' => json_encode(['https://1drv.ms/b/s!AqqmCVu74Dy630OFMJdxMStX_k4X', 'https://1drv.ms/b/s!AqqmCVu74Dy630OFMJdxMStX_k4X']),
                'link_content' => json_encode(['https://youtu.be/JaHAZPUO0Ic?si=QMwO_VvRqekthk5L', 'https://youtu.be/JaHAZPUO0Ic?si=QMwO_VvRqekthk5L']),
                'category' => 'Phân loại 1',
                'book' => 'Sách 1',
                'notes' => 'Ghi chú cho bài hát 1',
                'public' => true,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_name' => 'Chúa là mục tử tôi',
                'author' => 'Tác giả',
                'first_sentence' => 'Tình thương thiên chúa...',
                'link_pdf' => json_encode(['https://1drv.ms/b/s!AqqmCVu74Dy630OFMJdxMStX_k4X', 'https://1drv.ms/b/s!AqqmCVu74Dy630OFMJdxMStX_k4X']),
                'link_content' => json_encode(['https://youtu.be/JaHAZPUO0Ic?si=QMwO_VvRqekthk5L', 'https://youtu.be/JaHAZPUO0Ic?si=QMwO_VvRqekthk5L']),
                'category' => 'Phân loại 2',
                'book' => 'Sách 2',
                'notes' => 'Ghi chú cho bài hát 2',
                'public' => false,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
