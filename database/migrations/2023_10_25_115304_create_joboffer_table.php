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
        Schema::create('joboffer', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('job');
            $table->enum('type', ['CDI', 'CDD', 'Alternance'])->nullable();
            $table->string('description');
            $table->date('publication');
            $table->boolean('actif')->default(true);

            $table->unsignedBigInteger('user_id')->unsigned()->nullable();  // Clé étrangère pour faire référence à l'utilisateur

            $table->timestamps();

           // Définir la clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joboffer');
    }
};
