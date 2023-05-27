<?php

namespace Tests\Unit\Models;

use App\Models\Address;
use App\Models\Club;
use App\Models\Sport;
use Tests\TestCase;

class ClubModelTest extends TestCase
{
    /**
     * Test search clubs by name
     *
     * @return void
     */
    public function test_search_clubs_by_name(): void
    {
        Club::factory(100)->create();

        $clubs = Club::where(Club::NAME, 'like', "%a%")->get();

        $this->assertNotEmpty($clubs);
    }

    /**
     * Test search clubs by sport or address
     *
     * @return void
     */
    public function test_search_clubs_by_sport_or_address(): void
    {
        $address = Address::factory()->create();
        $sport = Sport::factory()->create();

        Club::factory(2)->create([
            Club::R_ADDRESS_ID => $address->id,
            Club::R_SPORT_ID => $sport->id,
        ]);

        $clubs = Club::where(Club::R_ADDRESS_ID, $address->id)->orWhere(Club::R_SPORT_ID, $sport->id)->get();

        $this->assertCount(2, $clubs);
    }

    /**
     * Test for searching clubs by name with pagination
     *
     * @return void
     */
    public function test_search_clubs_by_name_with_pagination(): void
    {
        Club::factory(100)->create();

        $perPage = 5;

        $clubs = Club::where(Club::NAME, 'like', "%a%")->paginate($perPage);

        $this->assertEquals($perPage, $clubs->perPage());
        $this->assertEquals(1, $clubs->currentPage());

        $this->assertCount($perPage, $clubs);
    }

    /**
     * Test for searching the clubs by sport or address with pagination
     *
     * @return void
     */
    public function test_search_clubs_by_sport_or_address_with_pagination(): void
    {
        $address = Address::factory()->create();
        $sport = Sport::factory()->create();

        Club::factory()->create([
            Club::R_ADDRESS_ID => $address->id,
            Club::R_SPORT_ID => $sport->id,
        ]);

        $perPage = 5;

        $clubs = Club::where(Club::R_ADDRESS_ID, $address->id)->orWhere(Club::R_SPORT_ID, $sport->id)->paginate($perPage);

        $this->assertEquals($perPage, $clubs->perPage());
        $this->assertEquals(1, $clubs->currentPage());

    }
}
