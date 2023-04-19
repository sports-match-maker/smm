<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    const NAME = 'name';
    const WEBSITE = 'website';
    const PHONE = 'phone';
    const DESCRIPTION = 'description';
    const PHOTO = 'photo';

    const R_ADDRESS_ID = 'address_id';
    const R_SPORT_ID = 'sport_id';
    const R_USER_ID = 'user_id';

    protected $fillable = [
        self::NAME,
        self::WEBSITE,
        self::PHONE,
        self::DESCRIPTION,
        self::PHOTO
    ];

}
