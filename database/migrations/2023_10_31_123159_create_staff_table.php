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
        Schema::create('staff', function (Blueprint $table) {
            $table->id(); // Colonne d'ID auto-incrémenté
            $table->string('first_name'); // Colonne pour le prénom
            $table->string('last_name'); // Colonne pour le nom
            $table->string('job'); // Colonne pour le poste
            $table->string('picture')->nullable(); // Colonne pour le nom du fichier de photo (nullable pour permettre les valeurs nulles)
            $table->string('group'); // Colonne pour le poste
            $table->timestamps(); // Colonnes pour les horodatages de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
