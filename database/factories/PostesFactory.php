<?php

namespace Database\Factories;

use App\Models\postes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = postes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            $this->faker->sentence,
            $this->faker->paragraph
        ];
    }
}
