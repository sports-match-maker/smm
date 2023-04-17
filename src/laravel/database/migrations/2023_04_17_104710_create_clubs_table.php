<?php

use App\Domain\Club\Models\Club;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string(Club::NAME);
            $table->string(Club::WEBSITE);
            $table->string(Club::PHONE);
            $table->string(Club::DESCRIPTION);
            $table->string(Club::PHOTO);

            $table->unsignedBigInteger(Club::R_ADDRESS_ID);
            $table->unsignedBigInteger(Club::R_SPORT_ID);
            $table->unsignedBigInteger(Club::R_USER_ID);

            $table->foreign(Club::R_ADDRESS_ID)->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(Club::R_SPORT_ID)->references('id')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(Club::R_USER_ID)->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
