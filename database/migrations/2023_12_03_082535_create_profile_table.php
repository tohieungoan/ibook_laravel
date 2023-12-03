<?php

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
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_account')->nullable();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->text('note')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
