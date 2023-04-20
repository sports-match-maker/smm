<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    public function club(): HasOne
    {
        return $this->hasOne(Club::class);
    }

    public function senders(): BelongsToMany
    {
        return $this->belongsToMany(Mailbox::class, 'mailboxes', Mailbox::R_SENDER_ID);
    }

    public function recivers(): BelongsToMany
    {
        return $this->belongsToMany(Mailbox::class, 'mailboxes', Mailbox::R_RECIEVER_ID);
    }
}
