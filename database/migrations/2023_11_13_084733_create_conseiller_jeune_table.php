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
        Schema::create('conseiller_jeune', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conseiller_id');
            $table->unsignedBigInteger('jeune_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('conseiller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jeune_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conseiller_jeune');
    }
};
