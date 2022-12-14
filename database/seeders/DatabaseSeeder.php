<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employment_type;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            PrefectureSeeder::class,
            CitySeeder::class,
            FeatureSeeder::class,
            IndustorySeeder::class,
            OccupationSeeder::class,
            EmploymentTypeSeeder::class,
            CompanySeeder::class,
            JobSeeder::class,
        ]);
        Company::factory(100)->create();
        Job::factory(100)->create();
    }
}
