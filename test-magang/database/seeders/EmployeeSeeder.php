<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::insert([
    [
        'name' => 'Rizky Ramadhan',
        'email' => 'rizky@example.com',
        'phone' => '081234567890',
        'birth_date' => '2000-01-01', 
        'gender' => 'Laki-laki',              
        'department_id' => 1,
        'position_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Siti Aisyah',
        'email' => 'aisyah@example.com',
        'phone' => '082345678901',
        'birth_date' => '2001-02-02', 
        'gender' => 'Perempuan',              
        'department_id' => 2,
        'position_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    }
}
