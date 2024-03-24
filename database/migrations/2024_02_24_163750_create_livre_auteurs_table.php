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
        Schema::create('livre_auteur', function (Blueprint $table) {
            $table->bigInteger('auteur_id')->unsigned();
            $table->bigInteger('livre_id')->unsigned();
            $table->primary(['auteur_id', 'livre_id']);
            $table->foreign('auteur_id')->references('id')->on('auteurs');
            $table->foreign('livre_id')->references('id')->on('livres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livre_auteur');
    }
};
