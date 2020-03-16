<?php

use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Video 1', 'Video 2', 'Video 3'];


        foreach ($names as $index => $name) {

            \App\Video::create([
                'user_id' => '1',
                'category_id' => '1',
                'name' => $name,
                'image' => "uploads/video_image/default.png",
                'description' => $name,
                'meta_keywords' => $name,
                'meta_description' => $name,
                'youtube' => 'https://www.youtube.com/embed/OJXiFrFB1Gs'
            ]);
        }
    }
}
