<?php

namespace App\Domain\Address\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    const CITY = 'city';

    protected $fillable = [
        self::CITY
    ];
}
