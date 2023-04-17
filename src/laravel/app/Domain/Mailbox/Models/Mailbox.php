<?php

namespace App\Domain\Mailbox\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    use HasFactory;

    const MESSAGE = 'message';
    const SEND_AT = 'send_at';
    const MARK_AS_READ = 'mark_as_read';

    const R_SENDER_ID = 'sender_id';
    const R_RECIEVER_ID = 'reciver_id';
}
