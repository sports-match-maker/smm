<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory(10)->create()->each(function ($player) {
            $sport = Sport::factory()->create();

            DB::table('players_have_sports')->insert(
                [
                    Player::R_SPORT_ID => $sport->id,
                    Sport::R_PLAYER_ID => $player->id,
                ]
            );
        });
    }
}
