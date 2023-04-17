<?php

namespace App\Domain\PlayerSport\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSport extends Model
{
    use HasFactory;

    const R_PLAYER_ID = 'player_id';
    const R_SPORT_ID = 'sport_id';
}
