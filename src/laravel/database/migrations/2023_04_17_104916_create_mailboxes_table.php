<?php

use App\Models\Mailbox;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mailboxes', function (Blueprint $table) {
            $table->id();

            $table->text(Mailbox::MESSAGE);
            $table->date(Mailbox::SEND_AT);
            $table->boolean(Mailbox::MARK_AS_READ)->default(false);

            $table->unsignedBigInteger(Mailbox::R_SENDER_ID);
            $table->unsignedBigInteger(Mailbox::R_RECIEVER_ID);

            $table->foreign(Mailbox::R_SENDER_ID)->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(Mailbox::R_RECIEVER_ID)->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mailboxes');
    }
};
