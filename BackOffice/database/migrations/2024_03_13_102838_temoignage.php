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
        // CREATION DE LA TABLE TEMOIGANGE
        Schema::create('temoignages', function (Blueprint $table) {
            $table->id('id');
            $table->string('titre_temoignage');
            $table->string('prenom_temoignage');
            $table->string('image_temoignage')->nullable();
            $table->date('date_temoignage');
            $table->text('contenu_temoignage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temoignages');
    }
};
