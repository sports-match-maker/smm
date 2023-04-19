<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportFactory extends Factory
{
    protected $model = Sport::class;

    public function definition(): array
    {
        return [
            Sport::NAME => 'Footbal' . $this->faker->numberBetween(1, 1000)
        ];
    }
}
