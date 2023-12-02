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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name')->unique();
            $table->string('c_slug')->index();
            $table->char('c_icon')->nullable();
            $table->string('c_avatar')->nullable();
            $table->tinyInteger('c_active')->default(1)->index();
            $table->integer('c_total_product')->default(0);
            $table->string('c_title_seo')->nullable();
            $table->string('c_description_seo')->nullable();
            $table->string('c_keyword_seo')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
