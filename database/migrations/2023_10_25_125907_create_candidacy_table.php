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
        Schema::create('candidacy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('joboffre_id')->unsigned()->nullable();
            $table->unsignedBigInteger('training_id')->unsigned()->nullable();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('mission_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('joboffre_id')->references('id')->on('joboffer')->onDelete('set null');
            $table->foreign('training_id')->references('id')->on('training')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            $table->foreign('mission_id')->references('id')->on('mission')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidacy');
    }
};
