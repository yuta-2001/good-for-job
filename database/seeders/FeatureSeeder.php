<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('features')->insert([
            [
                'name' => 'フレックス勤務',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '週２日から',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'リモート可',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '土日休み',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '週20時間から',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '社宅あり',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
