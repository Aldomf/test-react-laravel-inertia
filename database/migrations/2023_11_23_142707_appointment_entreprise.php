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
        Schema::create('appointmentEntreprise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('users');
            $table->foreignId('entreprise_id')->constrained('users');
            $table->date('date');
            $table->time('heure');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointmentEntreprise');
    }
};
