<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Action', 'Carton', 'Baby'];


        foreach ($names as $index => $name) {

            \App\Category::create([
                'name' => $name,
                'meta_keywords' => 'Action',
                'meta_description' => 'Carton',

            ]);
        }
    }
}
