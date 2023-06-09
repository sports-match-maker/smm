<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Club extends Model
{
    use HasFactory;

    const NAME = 'name';
    const WEBSITE = 'website';
    const PHONE = 'phone';
    const DESCRIPTION = 'description';
    const PHOTO = 'photo';
    const MAP_URL = 'map_url';

    const R_ADDRESS_ID = 'address_id';
    const R_SPORT_ID = 'sport_id';
    const R_USER_ID = 'user_id';

    protected $fillable = [
        self::NAME,
        self::WEBSITE,
        self::PHONE,
        self::DESCRIPTION,
        self::PHOTO,
        self::MAP_URL
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function sports(): hasOne
    {
        return $this->hasOne(Sport::class);
    }

}
