<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Club;
use App\Models\Sport;
use App\Models\User;
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
            Club::R_ADDRESS_ID => Address::factory()->create()->id,
            Club::R_SPORT_ID => Sport::factory()->create()->id,
            Club::R_USER_ID => User::factory()->create()->id
        ];
    }
}
