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
                'name' => 'test1',
                'email' => 'test1@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 1,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 2,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '552193532_6312fc5febfb7.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 3,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test4',
                'email' => 'test4@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 4,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '552193532_6312fc5febfb7.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test5',
                'email' => 'test5@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 2,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test6',
                'email' => 'test6@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 3,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test7',
                'email' => 'test7@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 3,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'test8',
                'email' => 'test8@test.com',
                'password' => Hash::make('password123'),
                'industory_id' => 3,
                'prefecture_id' => 1,
                'city_id' => 1,
                'address' => 'test',
                'president' => 'test',
                'count_of_employee' => 'test',
                'img' => '1945891802_62f771947ca54.png',
                'created_at' => '2021/01/01 11:11:11',
            ]
        ]);
    }
}
