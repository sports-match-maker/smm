<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    use HasFactory;

    const NAME = 'name';

    const R_PLAYER_ID = 'player_id';

    protected $fillable = [
        self::NAME
    ];

    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'players_have_sports');
    }
}
