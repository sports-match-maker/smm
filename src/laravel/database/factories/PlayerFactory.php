<?php

namespace Database\Factories;

use App\Enums\PlayerBodyTypeEnum;
use App\Enums\PlayerLevelEnum;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        return [
            Player::PHOTO => 'https://placehold.co/600x400',
            Player::LEVEL => PlayerLevelEnum::ADVANCED,
            Player::COMMENT => fake()->text(140),
            Player::HEIGHT => fake()->numberBetween(160, 215),
            Player::WIDTH => fake()->numberBetween(60, 120),
            Player::BODY_TYPE => PlayerBodyTypeEnum::ATHLETIC,
            Player::DRINKER => fake()->boolean(),
            Player::HAVE_CAR => fake()->boolean(),
            Player::SMOKER => fake()->boolean(),
            Player::R_USER_ID => User::factory()->create()->id
        ];
    }
}
