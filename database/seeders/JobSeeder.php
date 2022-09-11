<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            [
                'name' => 'test',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 1,
                'occupation_id' => 2,
                'employment_type_id' => 1,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
            [
                'name' => 'test1',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 2,
                'occupation_id' => 1,
                'employment_type_id' => 3,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
            [
                'name' => 'test3',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 1,
                'occupation_id' => 4,
                'employment_type_id' => 2,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
            [
                'name' => 'test4',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 3,
                'occupation_id' => 5,
                'employment_type_id' => 5,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
            [
                'name' => 'test5',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 4,
                'occupation_id' => 2,
                'employment_type_id' => 1,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
            [
                'name' => 'test6',
                'message' => 'テストテストテストテストテスト',
                'company_id' => 1,
                'occupation_id' => 2,
                'employment_type_id' => 1,
                'img' => '1115792582_62f733ad2fc00.png',
                'prefecture_id' => 1,
                'city_id' => 2,
                'address' => 'test',
                'access' => '新宿駅から徒歩2分',
                'payment' => '月給25万円〜',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'status' => 1,
            ],
        ]);
    }
}
