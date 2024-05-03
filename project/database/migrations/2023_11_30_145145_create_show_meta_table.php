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
        Schema::create('show_meta', function (Blueprint $table) {
            $table->comment('Метадані вистав');

            $table->id();
            $table->unsignedBigInteger('show_id')->nullable(false)->comment('Вистава');
            $table->string('h1')->nullable(false)->comment('<h1>...</h1>');
            $table->string('title')->nullable(false)->comment('<title>...</title>');
            $table->string('description')->nullable(false)->comment('<meta name=\'description\' content=\'...\'>');
            $table->string('keywords')->nullable(false)->comment('<meta name=\'keywords\' content=\'...\'>');
            $table->timestamps();

            $table->foreign('show_id')->references('id')->on('shows')->onDelete('cascade');

            $table->unique(['show_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_meta');
    }
};
