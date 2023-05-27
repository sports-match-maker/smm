<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    const CITY = 'city';

    protected $fillable = [
        self::CITY
    ];

    public function clubs(): HasMany
    {
       return $this->hasMany(Club::class);
    }
}
