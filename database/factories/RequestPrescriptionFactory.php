<?php

namespace Database\Factories;
use App\Models\RequestPrescription;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestPrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->word(),
            'body' => $this->faker->realText($maxNbChars = 200),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}