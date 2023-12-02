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
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tr_user_id')->index()->default(0);
            $table->integer('tr_total')->default(0);
            $table->string('tr_note')->nullable();
            $table->string('tr_address')->nullable();
            $table->string('tr_phone')->nullable();
            $table->tinyInteger('tr_status')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
