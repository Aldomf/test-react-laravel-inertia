<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateUsersTableForEmail extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->after('identifiant'); // Nouvelle colonne pour l'email
        });

        // Copie des données de 'identifiant' vers 'new_email'
        \DB::table('users')->update(['email' => \DB::raw('identifiant')]);

        // Suppression de la colonne 'identifiant'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('identifiant');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('identifiant')->after('email'); // Recréation de la colonne 'identifiant'
        });

        // Copie des données de 'email' vers 'identifiant'
        \DB::table('users')->update(['identifiant' => \DB::raw('email')]);

        // Suppression de la colonne 'email'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}