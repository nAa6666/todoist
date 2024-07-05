<?php

namespace Database\Seeders;

use App\Models\Priorities;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Priorities::insert([
            ['name' => 'Low', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'High', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
