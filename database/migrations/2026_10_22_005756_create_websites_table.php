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
        Schema::create('websites', function (Blueprint $table) {
            $table->id('id_website');
            $table->unsignedBigInteger('id_template');
            $table->foreign('id_template')->references('id_template')->on('templates')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_website');
            $table->string('bio');
            $table->string('slug')->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
