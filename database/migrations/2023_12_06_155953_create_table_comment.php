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
        Schema::create('table_comment', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('id_account')->nullable();
            $table->integer('id_product')->nullable();
            $table->tinyInteger('star')->default(0);
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_comment');
    }
};
