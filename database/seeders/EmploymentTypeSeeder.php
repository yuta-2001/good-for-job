<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employment_types')->insert([
            [
                'name' => '正社員',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '契約社員',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '派遣社員',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => '業務委託',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'インターン',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'アルバイト',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'name' => 'その他',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
