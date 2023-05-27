<?php

namespace Tests\Unit\Models;

use App\Models\Address;
use App\Models\Club;
use Tests\TestCase;

class AddressModelTest extends TestCase
{
    /**
     * Test to list all addresses
     *
     * @return void
     */
    public function test_list_all_addresses(): void
    {
        $addresses = Address::factory(10)->create();

        $this->assertCount(10, $addresses);
    }

    /**
     * Test to search clubs by address
     *
     * @return void
     */
    public function test_search_clubs_by_addreess(): void
    {
        Club::factory(50)->create();

        $address = Address::where(Address::CITY, 'like', '%a%')->with('clubs')->get();

        $this->assertTrue($address->every(function ($item) {
            return in_array('clubs', array_keys($item->toArray()));
        }));
    }

    /**
     * Test to search clubs by address wuth pagination
     *
     * @return void
     */
    public function test_search_players_by_addreess_with_pagination(): void
    {
        Club::factory()->create();

        $perPage = 5;

        $address = Address::where(Address::CITY, 'like', '%a%')->with('clubs')->paginate($perPage);

        $this->assertEquals($perPage, $address->perPage());
        $this->assertEquals(1, $address->currentPage());
    }
}
