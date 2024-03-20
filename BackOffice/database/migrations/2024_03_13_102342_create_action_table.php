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
        Schema::create('action', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action');
        $table->id_action();
            $table->string('titre_action');
            $table->date('date');
            $table->time('heure');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->int('nb_inscrit');
            $table->boolean('is_private');
            $table->int('nb_sensibilise');






    }
};
