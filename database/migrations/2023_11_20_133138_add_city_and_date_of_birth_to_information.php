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
        Schema::table('information', function (Blueprint $table) {
            $table->string('city')->after('email')->nullable();
            $table->date('dateOfBirth')->after('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('information', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('dateOfBirth');
        });
    }
};
