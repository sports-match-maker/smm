<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mailbox extends Model
{
    use HasFactory;

    const MESSAGE = 'message';
    const SEND_AT = 'send_at';
    const MARK_AS_READ = 'mark_as_read';

    const R_SENDER_ID = 'sender_id';
    const R_RECIEVER_ID = 'reciver_id';

    protected $fillable = [
        self::R_RECIEVER_ID,
        self::R_SENDER_ID,
        self::MESSAGE,
        self::SEND_AT,
        self::MARK_AS_READ
    ];

    public function senders(): HasMany
    {
        return $this->hasMany(User::class, 'id', self::R_SENDER_ID);
    }

    public function recivers(): HasMany
    {
        return $this->hasMany(User::class, 'id', self::R_RECIEVER_ID);
    }


}
