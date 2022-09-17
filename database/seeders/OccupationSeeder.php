<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('occupations')->insert([
            [
                'name' => 'エンジニア',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '営業',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '事務',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'マーケター',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '人事',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '秘書',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'ライター',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'デザイナー',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '建築士',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '研究員',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '会計士',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '弁護士',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '税理士',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '医者',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
