<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\PositionSeeder;
use Database\Seeders\EmployeeSeeder;
use EmployeeSeeder as GlobalEmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user hanya jika belum ada
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Jalankan seeder lainnya
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
