<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string(User::FNAME);
            $table->string(User::LNAME);
            $table->string(User::BIRTH);
            $table->string(User::GENDER);
            $table->boolean(User::IS_ACTIVE)->default(false);

            $table->string(User::EMAIL)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string(User::PASSWORD);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
