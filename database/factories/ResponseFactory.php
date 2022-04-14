<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\RequestPrescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
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
            'body' => $this->faker->sentence(),
            'user_id' => User::inRandomOrder()->first()->id,
            'requestPrescription_id' => RequestPrescription::inRandomOrder()->first()->id,

        ];
    }
}
