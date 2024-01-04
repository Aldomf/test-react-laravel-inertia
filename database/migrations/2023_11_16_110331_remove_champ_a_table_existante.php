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
        Schema::table('preregistrations', function (Blueprint $table) {
            //
            Schema::table('preregistrations', function (Blueprint $table) {
                $table->dropColumn('identifiant');
                $table->dropColumn('gender');
                $table->dropColumn('address');
                $table->dropColumn('situation');
                $table->dropColumn('housing');
                $table->dropColumn('income');
                $table->dropColumn('education_level');
                $table->dropColumn('cv_path');
                $table->dropColumn('company_address');
                $table->dropColumn('website');
                $table->dropColumn('legal_form');
                $table->dropColumn('rcs');
                $table->dropColumn('description');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preregistrations', function (Blueprint $table) {
            //
        });
    }
};
