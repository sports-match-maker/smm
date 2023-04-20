<?php

use App\Models\Player;
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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string(Player::PHOTO);
            $table->string(Player::LEVEL);
            $table->text(Player::COMMENT);

            $table->boolean(Player::SMOKER)->default(null);
            $table->text(Player::HEIGHT)->default(null);
            $table->string(Player::WIDTH)->default(null);
            $table->string(Player::BODY_TYPE)->default(null);
            $table->string(Player::DRINKER)->default(null);
            $table->string(Player::HAVE_CAR)->default(null);

            $table->unsignedBigInteger(Player::R_USER_ID);
            $table->foreign(Player::R_USER_ID)->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger(Player::R_ADDRESS_ID);
            $table->foreign(Player::R_ADDRESS_ID)->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
