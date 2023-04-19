<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    const FNAME = 'fname';
    const LNAME = 'lname';
    const BIRTH = 'birth';
    const GENDER = 'gender';
    const IS_ACTIVE = 'is_active';
    const EMAIL = 'email';
    const PASSWORD = 'password';

    protected $fillable = [
        self::FNAME,
        self::LNAME,
        self::BIRTH,
        self::GENDER,
        self::IS_ACTIVE,
        self::EMAIL,
        self::PASSWORD
    ];

    protected $hidden = [
        self::PASSWORD
    ];
}
