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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('gender_id')->constrained();
            $table->unsignedTinyInteger('skill');
            $table->unsignedTinyInteger('strength');
            $table->unsignedTinyInteger('speed');
            $table->unsignedTinyInteger('reaction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
