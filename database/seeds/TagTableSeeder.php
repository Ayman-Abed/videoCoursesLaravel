<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
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

            \App\Tag::create([
                'name' => $name
            ]);
        }
    }
}
