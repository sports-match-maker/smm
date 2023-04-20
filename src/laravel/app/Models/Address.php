<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory;

    const CITY = 'city';

    protected $fillable = [
        self::CITY
    ];

    public function clubs(): BelongsToMany
    {
       return $this->belongsToMany(Club::class);
    }
}
