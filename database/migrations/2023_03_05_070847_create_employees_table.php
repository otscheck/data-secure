<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('quartier')->nullable();
            $table->string('telephone')->nullable();
            $table->foreignId('region_id')->constrained()->onDelete('cascade')->default(1);
            $table->foreignId('poste_id')->constrained()->onDelete('cascade')->default(1);
            $table->double('prime')->nullable();
            $table->date('engage_le')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('depart_le')->nullable();
            $table->double('taille', 5, 2)->nullable();
            $table->enum('sexe', ['M', 'F'])->default('M');
            $table->text('description')->nullable();
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
