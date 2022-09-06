<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 1,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54',
                'created_at' => '2021/01/01 11:11:11',
            ]
        ]);
    }
}
