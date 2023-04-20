<?php

namespace Tests\Unit\Models;

use App\Models\Player;
use App\Models\Sport;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PlayerModelTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_top_10_latest_created_profiles_of_players(): void
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

    public function test_search_player_by_name(): void
    {
       $this->markTestIncomplete("test_search_player_by_name");
    }

    public function test_search_player_by_sport_or_address(): void
    {
       $this->markTestIncomplete("test_search_player_by_sport_or_address");
    }
}
