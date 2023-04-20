<?php

namespace Database\Factories;

use App\Models\Mailbox;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailboxFactory extends Factory
{
    protected $model = Mailbox::class;

    public function definition(): array
    {
        return [
            Mailbox::R_RECIEVER_ID => User::factory()->create()->id,
            Mailbox::R_SENDER_ID => User::factory()->create()->id,
            Mailbox::MARK_AS_READ => fake()->boolean(),
            Mailbox::MESSAGE => fake()->text(150),
            Mailbox::SEND_AT => fake()->date()
        ];
    }
}
