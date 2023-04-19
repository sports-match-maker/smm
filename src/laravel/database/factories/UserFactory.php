<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserGenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            User::FNAME => $this->faker->firstName(),
            User::LNAME => $this->faker->lastName(),
            User::BIRTH => fake()->date(),
            User::GENDER => UserGenderEnum::MALE,
            User::IS_ACTIVE => fake()->boolean(),
            User::EMAIL => fake()->unique()->safeEmail(),
            User::PASSWORD => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => true,
        ];
    }

}
