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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom_complet');
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->foreignId('region_id')->constrained()->onDelete('cascade')->default(1);
            $table->foreignId('poste_id')->constrained()->onDelete('cascade')->default(1);
            $table->double('prime')->default(0);
            $table->date('engage_le')->nullable();
            $table->date('depart_le')->nullable();
            $table->double('taille', 5, 2)->nullable();
            $table->enum('sexe', ['M', 'F'])->default('M');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
