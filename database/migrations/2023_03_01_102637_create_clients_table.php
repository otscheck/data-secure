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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('num_contrat');
            $table->string('nom_complet');
            $table->text('adresse');
            $table->string('nom_contact')->nullable();
            $table->string('tel_contact')->nullable();
            // $table->integer('nb_gardes_factures')->nullable();
            // $table->integer('nb_gardes_affectes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};