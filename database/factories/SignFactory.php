<?php

namespace Database\Factories;

use App\Models\Petition;
use App\Models\Sign;
use Illuminate\Database\Eloquent\Factories\Factory;

class SignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'confirmed_at' => now(),
            'petition_id' => Petition::inRandomOrder()->first()->id,
        ];
    }
}
