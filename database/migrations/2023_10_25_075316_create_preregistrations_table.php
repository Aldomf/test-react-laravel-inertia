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
        Schema::create('preregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('identifiant');
            $table->string('password');
            $table->boolean('valid')->default(false);
            $table->enum('role', ['jeune', 'entreprise']);
            
                // Champs spécifiques pour les jeunes
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', ['homme', 'femme', 'autre'])->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('situation')->nullable();
            $table->string('housing')->nullable();
            $table->decimal('income', 10, 2)->nullable();
            $table->string('education_level')->nullable();
            $table->string('cv_path')->nullable();

            // Champs spécifiques pour les entreprises
            $table->string('company_name')->nullable();
            $table->string('siret')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('website')->nullable();
            $table->enum('legal_form', ['sarl', 'sas', 'other'])->nullable();
            $table->string('rcs')->nullable();
            $table->text('description')->nullable();
            $table->string('responsible_name')->nullable();


        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preregistrations');
    }
};
