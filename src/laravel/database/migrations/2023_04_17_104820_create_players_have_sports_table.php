<?php

use App\Models\Player;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PlayerSport;
use App\Models\Sport;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players_have_sports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger(Sport::R_PLAYER_ID);
            $table->unsignedBigInteger(Player::R_SPORT_ID);

            $table->foreign(Sport::R_PLAYER_ID)->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(Player::R_SPORT_ID)->references('id')->on('sports')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_have_sports');
    }
};
