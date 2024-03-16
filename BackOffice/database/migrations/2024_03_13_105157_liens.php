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
        // CREATION DE LA TABLE LIENS
        Schema::create('liens', function (Blueprint $table) {
            $table->id('id');
            $table->string('libelle');
            $table->string('type');
            $table->foreignId('partenaire_id')->constrained('partenaires'); // Cle etrangere
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liens');
    }
};
