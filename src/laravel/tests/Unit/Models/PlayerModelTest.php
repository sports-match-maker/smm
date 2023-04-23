<?php

namespace Tests\Unit\Models;

use App\Models\Address;
use App\Models\Player;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to get the top 10 latest created profiles of players.
     */
    public function test_get_top_10_latest_created_profiles_of_players(): void
    {
        Player::factory(10)->create()->each(function ($player) {
            $sport = Sport::factory()->create();

            $player->sports()->attach($sport);
        });

        $sports = Sport::withCount('players')->get();

        $this->assertCount(10, $sports);
        $this->assertTrue($sports->every(function ($item) {
            return in_array('players_count', array_keys($item->toArray()));
        }));
    }

    /**
     * Test to search players by first name or last name.
     */
    public function test_search_players_by_first_name_or_last_name(): void
    {
        $player = Player::factory([
            Player::R_USER_ID => User::factory([
                User::FNAME => 'John',
                User::LNAME => 'Doe',
            ])->create()->id,
        ])->create();

        $this->assertInstanceOf(Player::class, $player);

        $user = User::where(User::FNAME, 'like', '%John%')
            ->orWhere(User::LNAME, 'like', '%Doe%')
            ->with('player')
            ->first();

        $this->assertEquals('John', $user->fname);
        $this->assertEquals('Doe', $user->lname);
        $this->assertInstanceOf(Player::class, $user->player);
    }

    /**
     * Test to search players by sport or address.
     */
    public function test_search_players_by_sport_or_address(): void
    {
        $address = Address::factory([
            Address::CITY => 'Skopje',
        ])->create();

        $player = Player::factory([
            Player::R_ADDRESS_ID => $address->id,
        ])->create();

        $sport = Sport::factory([
            Sport::NAME => 'Golf',
        ])->create();

        $player->sports()->attach($sport);

        $search = Player::with('sports')->with('address')
            ->whereHas('sports', function ($q) {
                return $q->where(Sport::NAME, 'like', '%Golf%');
            })
            ->orWhereHas('address', function ($q) {
                return $q->where(Address::CITY, 'like', '%Skopje%');
            })
            ->get();

        $this->assertNotEmpty($search);
    }
}
