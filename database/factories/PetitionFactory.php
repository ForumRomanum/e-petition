<?php

namespace Database\Factories;

use App\Models\Petition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Petition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => '<p>' . $this->faker->text . '</p>',
            'user_id' => User::notAdmin()->inRandomOrder()->first()->id,
            'goal' => rand(1000, 100000),
            'is_public' => true,
            'type' => Petition::PETITION_TO_MINISTRY
        ];
    }
}
