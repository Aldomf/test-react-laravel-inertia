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
        Schema::table('user_job_offer_and_user_training', function (Blueprint $table) {
            Schema::table('user_job_offer', function (Blueprint $table) {
                $table->string('status')->default('en attente')->after('job_offer_id');
            });
        
            Schema::table('user_training', function (Blueprint $table) {
                $table->string('status')->default('en attente')->after('training_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_job_offer_and_user_training', function (Blueprint $table) {
            Schema::table('user_job_offer', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        
            Schema::table('user_training', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        });
    }
};
