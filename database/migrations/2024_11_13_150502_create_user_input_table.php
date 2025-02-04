<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userInput', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('siteName'); // Nom du site
            $table->text('description')->nullable(); // Description du site (optionnel)
            $table->string('logoUrl')->nullable(); // URL du logo (optionnel)
            $table->string('faveIcon')->nullable(); // URL du favicon (optionnel)
            $table->string('color1'); // Première couleur
            $table->string('color2'); // Deuxième couleur
            $table->string('color3'); // Troisième couleur (optionnel)
            $table->unsignedBigInteger('template_id')->nullable(); // Clé étrangère vers la table templateso
            $table->timestamps(); // Colonnes created_at et updated_at

            // Définir la clé étrangère
            $table->foreign('template_id')
                ->references('id')
                ->on('template')
                ->onDelete('cascade'); // Supprime les entrées UserInput si le template associé est supprimé
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userInput');
    }
};
