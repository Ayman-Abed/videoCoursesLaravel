<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['About us', 'Contact Us', 'Docs'];


        foreach ($names as $index => $name) {

            \App\Page::create([
                'name' => $name,
                'slug' => trim(str_replace(" ", "_", $name)),
                'description' => $name,
                'meta_keywords' => $name,
                'meta_description' => $name
            ]);
        }
    }
}
