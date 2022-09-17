<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Industory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'industory_id' => $this->faker->numberBetween($min = 1, $max = 11),
            'prefecture_id' => 1,
            'city_id' => 1,
            'address' => $this->faker->realText(10),
            'president' => $this->faker->name,
            'count_of_employee' => $this->faker->numberBetween($min = 10, $max = 200),
            'img' => '1076268041_6312e8ae98eb4.png',
        ];
    }
}
