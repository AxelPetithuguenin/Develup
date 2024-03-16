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
        // CREATION DE LA TABLE FONCTION
        Schema::create('fonctions', function (Blueprint $table) {
            $table->id('id');
            $table->string('libelle');
            $table->foreignId('id_bureau')->constrained('bureau', 'id'); // Cle etrangere
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonctions');
    }
};
