<?php

namespace Tests\Unit\Models;

use App\Models\Club;
use App\Models\Player;
use App\Models\Sport;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SportModelTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_popular_sports_count_players(): void
    {
        Player::factory(2)->create()->each(function ($player) {
            $sport = Sport::factory()->create();

            DB::table('players_have_sports')->insert(
                [
                    Player::R_SPORT_ID => $sport->id,
                    Sport::R_PLAYER_ID => $player->id,
                ]
            );
        });

        $sports = Sport::withCount('players')->get();

        $this->assertCount(2, $sports);

        $this->assertTrue($sports->every(function ($item) {
            return in_array('players_count', array_keys($item->toArray()));
        }));
    }

    public function test_popular_sports_count_clubs(): void
    {
        Club::factory(10)->create();

        $sports = Sport::withCount('clubs')->get();

        $this->assertCount(10, $sports);

        $this->assertTrue($sports->every(function ($item) {
            return in_array('clubs_count', array_keys($item->toArray()));
        }));
    }
}
