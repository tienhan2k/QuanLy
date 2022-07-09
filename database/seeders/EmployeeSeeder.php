<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(
            [
            // 'name' => 'Van Tien dep trai 3',
            // 'sex' => 'Nam',
            // 'phoneNumber' => '0123456789'
            ]
    );
    }
}
