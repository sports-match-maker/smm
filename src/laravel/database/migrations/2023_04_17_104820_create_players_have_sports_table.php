<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Domain\PlayerSport\Models\PlayerSport;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players_have_sports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger(PlayerSport::R_PLAYER_ID);
            $table->unsignedBigInteger(PlayerSport::R_SPORT_ID);

            $table->foreign(PlayerSport::R_PLAYER_ID)->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(PlayerSport::R_SPORT_ID)->references('id')->on('sports')->onDelete('cascade')->onUpdate('cascade');


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
