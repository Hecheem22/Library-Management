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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string("isbn", 100)->unique;
            $table->string("titre", 100)->unique;
            $table->integer("annedition");
            $table->double("prix");
            $table->integer("qtestock");
            $table->string("couverture");
            $table->unsignedBigInteger("specialite_id");
            $table->foreign('specialite_id')
                ->references('id')
                ->on('specialites')
                ->onDelete('restrict');
            $table->unsignedBigInteger("editeur_id");
            $table->foreign('editeur_id')
                ->references('id')
                ->on('editeurs')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
