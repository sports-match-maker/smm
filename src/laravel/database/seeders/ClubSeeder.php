<?php

namespace Database\Seeders;

use App\Domain\Address\Models\Address;
use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::factory(10)->create();
    }
}
