<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Position::insert([
            ['title' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Staff', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Intern', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
