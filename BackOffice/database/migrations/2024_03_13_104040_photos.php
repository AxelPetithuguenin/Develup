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
        // CREATION DE LA TABLE PHOTOS
        Schema::create('photos', function (Blueprint $table) {
            $table->id('id');
            $table->string('photo');
            $table->string('titre');
            $table->text('legende');
            $table->foreignId('id_actions')->constrained('actions', 'id'); // Cle etrangere
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
