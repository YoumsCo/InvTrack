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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("matricule")->unique();
            $table->string("nom");
            $table->string("prenom")->nullable();
            $table->date("date_naissance")->nullable();
            $table->string("lieu")->nullable();
            $table->string("redoublant")->nullable();
            $table->integer("niveau");
            $table->string("statut");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
