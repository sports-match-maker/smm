<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    protected $model = Club::class;

    public function definition(): array
    {
        return [
            Club::NAME => fake()->name,
            Club::WEBSITE => fake()->url(),
            Club::PHONE => fake()->phoneNumber(),
            Club::DESCRIPTION => fake()->text(200),
            Club::PHOTO => 'https://placehold.co/600x400',
            Club::R_ADDRESS_ID => 1,
            Club::R_SPORT_ID => 1,
            Club::R_USER_ID => 1
        ];
    }
}
