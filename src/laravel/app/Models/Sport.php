<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sport extends Model
{
    use HasFactory;

    const NAME = 'name';

    const R_PLAYER_ID = 'player_id';

    protected $fillable = [
        self::NAME
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function sports(): BelongsToMany
    {
        return $this->belongsToMany(Players::class);
    }
}
