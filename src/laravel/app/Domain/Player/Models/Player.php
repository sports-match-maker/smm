<?php

namespace App\Domain\Player\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
