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
        // CREATION DE LA TABLE PIVOT ENTRE PARTENAIRES ET LIEN
        Schema::create('partenaire_lien', function (Blueprint $table) {
            $table->foreignId('partenaire_id')->constrained('partenaires', 'id');
            $table->foreignId('lien_id')->constrained('liens', 'id')->cascadeOnDelete();
            $table->primary(['partenaire_id', 'lien_id']);
            $table->string('lien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaire_lien');
    }
};
