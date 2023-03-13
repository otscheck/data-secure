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
            $table->string('nom_complet');
            $table->string('num_contrat');
            $table->text('adresse');
            $table->string('image')->nullable();
            $table->string('nom_contact')->nullable();
            $table->string('tel_contact')->nullable();
            $table->date('date_debut_contrat')->nullable();
            $table->string('dernier_mois_paye')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('clients');
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
