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
        // CREATION DE LA TABLE PIVOT 
        Schema::create('bureau_fonctions', function (Blueprint $table) {
            $table->foreign('bureau_id')->references('id')->on('bureau')->onDelete('cascade');
            $table->foreign('fonctions_id')->references('id')->on('fonctions')->onDelete('cascade');
            $table->primary(['bureau_id', 'fonctions_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_fonctions');
    }
};
