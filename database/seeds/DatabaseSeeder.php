<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(VideoTableSeeder::class);
    }
}
