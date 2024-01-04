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
        Schema::table('training', function (Blueprint $table) {
            $table->string('image_path')->nullable();
            $table->string('place');
            $table->text('job_summary');
            $table->text('objectives');
            $table->string('duration');
            $table->text('prerequisites')->nullable();
            $table->text('program');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training', function (Blueprint $table) {
            $table->dropColumn('image_path');
            $table->dropColumn('place');
            $table->dropColumn('job_summary');
            $table->dropColumn('objectives');
            $table->dropColumn('duration');
            $table->dropColumn('prerequisites');
            $table->dropColumn('program');
        });
    }
};
