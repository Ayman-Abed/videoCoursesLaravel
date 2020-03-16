<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
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

            \App\Skill::create([
                'name' => $name,
            ]);
        }
    }
}
