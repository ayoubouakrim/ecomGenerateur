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
        /*Schema::create('component', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
        Schema::create('component', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('htmlStructure');
            $table->longText('cssStyle');
            $table->unsignedBigInteger('type_id'); // Colonne clé étrangère
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('type_id')
                ->references('id')
                ->on('type')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component');
    }
};
