<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
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
            'message' => $this->faker->realText(20),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'occupation_id' => $this->faker->numberBetween($min = 1, $max = 14),
            'employment_type_id' => $this->faker->numberBetween($min = 1, $max = 7),
            'img' => '145255742_6312fa2d9e628.png',
            'prefecture_id' => 1,
            'city_id' => 1,
            'address' => $this->faker->name,
            'access' => $this->faker->realText(20),
            'payment' => $this->faker->realText(20),
            'content' => $this->faker->realText(60),
            'status' => 1,
        ];
    }
}
