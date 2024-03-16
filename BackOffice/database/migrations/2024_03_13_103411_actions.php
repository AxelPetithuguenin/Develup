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
        // CREATION DE LA TABLE ACTIONS
        Schema::create('actions', function (Blueprint $table) {
            $table->id('id');
            $table->string('titre_action');
            $table->date('date_action');
            $table->time('heure_action');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->integer('nb_inscrits');
            $table->boolean('is_private');
            $table->integer('nb_sensibilises')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
