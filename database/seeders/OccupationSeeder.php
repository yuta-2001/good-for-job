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
                'name' => 'エンジニア職',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '営業職',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '事務職',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'マーケター',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '人事職',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '秘書',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
