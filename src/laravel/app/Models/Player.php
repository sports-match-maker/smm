<?php

namespace App\Models;

use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;

    const PHOTO = 'photo';
    const LEVEL = 'level';
    const COMMENT = 'comment';

    const SMOKER = 'smoker';
    const HEIGHT = 'height';
    const WIDTH = 'width';
    const BODY_TYPE = 'body_type';
    const DRINKER = 'drinker';
    const HAVE_CAR = 'have_car';

    const R_USER_ID = 'user_id';
    const R_SPORT_ID = 'sport_id';
    const R_ADDRESS_ID = 'address_id';

    protected $fillable = [
        self::PHOTO,
        self::LEVEL,
        self::COMMENT,

        self::SMOKER,
        self::HEIGHT,
        self::WIDTH,
        self::BODY_TYPE,
        self::DRINKER,
        self::HAVE_CAR
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sports(): BelongsToMany
    {
        return $this->belongsToMany(Sport::class, 'players_have_sports');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
