<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industories')->insert([
            [
                'name' => 'IT',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'サービス',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'ペット',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '人材',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '食品',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '化粧品',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '医療',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '教育',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '土木',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '観光',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '保育',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
