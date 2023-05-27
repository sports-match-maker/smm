<?php

namespace Tests\Unit\Models;

use App\Models\Mailbox;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test for registration of user
     *
     * @return void
     */
    public function test_create_new_user(): void
    {
        $userFactory = User::factory()->make();

        $user = User::create([...$userFactory->toArray(), User::PASSWORD => $userFactory->password]);

        $this->assertEquals($userFactory->fname, $user->fname);
        $this->assertEquals($userFactory->lname, $user->lname);
        $this->assertEquals($userFactory->birth, $user->birth);
        $this->assertEquals($userFactory->gender, $user->gender);
        $this->assertEquals($userFactory->is_active, $user->is_active);
        $this->assertEquals($userFactory->email, $user->email);
        $this->assertEquals($userFactory->password, $user->password);
    }

    /**
     * Test to update user profile
     *
     * @return void
     */
    public function test_update_user_details(): void
    {

        $user = User::factory()->create();

        $generateNewInfoForUser = User::factory()->make();

        $user->fname = $generateNewInfoForUser->fname;
        $user->lname = $generateNewInfoForUser->lname;
        $user->birth = $generateNewInfoForUser->birth;
        $user->gender = $generateNewInfoForUser->gender;
        $user->is_active = $generateNewInfoForUser->is_active;
        $user->email = $generateNewInfoForUser->email;
        $user->password = $generateNewInfoForUser->password;

        $user->save();

        $user = User::find($user->id);

        $this->assertEquals($user->fname, $generateNewInfoForUser->fname);
        $this->assertEquals($user->lname, $generateNewInfoForUser->lname);
        $this->assertEquals($user->birth, $generateNewInfoForUser->birth);
        $this->assertEquals($user->gender, $generateNewInfoForUser->gender->value);
        $this->assertEquals($user->is_active, $generateNewInfoForUser->is_active);
        $this->assertEquals($user->email, $generateNewInfoForUser->email);
        $this->assertEquals($user->password, $generateNewInfoForUser->password);
    }

    /**
     * Test for contact other player to play a game
     *
     * @return void
     */
    public function test_send_notification_in_mailbox(): void
    {
        $sender_id =  User::factory()->create()->id;
        $reciver_id = User::factory()->create()->id;

        $notification = Mailbox::factory()->make();

        $addNotificationToMailbox = Mailbox::create([
            ...$notification->toArray(),
            Mailbox::R_RECIEVER_ID => $reciver_id,
            Mailbox::R_SENDER_ID => $sender_id,
        ]);

        $this->assertEquals($reciver_id, $addNotificationToMailbox->reciver_id);
        $this->assertEquals($sender_id, $addNotificationToMailbox->sender_id);
        $this->assertEquals($notification->mark_as_read, $addNotificationToMailbox->mark_as_read);
        $this->assertEquals($notification->message, $addNotificationToMailbox->message);
        $this->assertEquals($notification->send_at, $addNotificationToMailbox->send_at);
    }

    /**
     * Test for showing inbox of player for new maches for other players
     *
     * @return void
     */
    public function test_mailbox_inbox_for_user(): void
    {
        Mailbox::factory(2)->create();

        $mailBox = Mailbox::with('senders')->with('recivers')->get();

        $this->assertCount(2, $mailBox);

        $this->assertTrue($mailBox->every(function ($item) {
            return in_array('senders', array_keys($item->toArray()));
        }));

        $this->assertTrue($mailBox->every(function ($item) {
            return in_array('recivers', array_keys($item->toArray()));
        }));
    }

    /**
     * Test to check send messages to other players
     *
     * @return void
     */
    public function test_mailbox_send_notifications(): void
    {
        $sender = User::factory()->create();

        $sendMsgsByUser = Mailbox::factory(2)->create([
            Mailbox::R_SENDER_ID => $sender->id
        ]);

        $this->assertTrue($sendMsgsByUser->every(function ($item) use ($sender) {
            return $sender->id === $item->sender_id;
        }));
    }

}
