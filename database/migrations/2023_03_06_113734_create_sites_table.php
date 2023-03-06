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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade')->default(1);
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade')->default(1);
            $table->date('ouvert_le')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('derniere_visite')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('ferme_le')->nullable();
            $table->integer('nb_agent_factures')->nullable();
            $table->integer('nb_agent_deployes')->nullable();
            $table->integer('nb_alarme')->default(0);
            $table->integer('nb_chien')->default(0);
            $table->decimal('prix_agent')->nullable();
            $table->decimal('prix_chien')->nullable();
            $table->decimal('prix_alarme')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
