<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AddFaqsSeeder::class);
        $this->call(AddCategorySeeder::class);
        $this->call(AddColorSeeder::class);
        $this->call(AddProductSeeder::class);
    }
}
