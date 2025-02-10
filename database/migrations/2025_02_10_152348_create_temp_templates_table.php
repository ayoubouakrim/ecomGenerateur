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
//    public function up()
//    {
//        Schema::create('temp_templates', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
//        });
//    }
    public function up()
    {
        Schema::create('temp_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // L'utilisateur qui modifie
            $table->foreignId('original_id')->constrained('template')->onDelete('cascade'); // Référence au template original
            $table->longText('content'); // Contenu HTML modifié
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_templates');
    }
};
