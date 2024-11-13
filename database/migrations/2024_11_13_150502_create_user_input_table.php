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
        Schema::create('user_input', function (Blueprint $table) {
            $table->id();
            $table->string('siteName');
            $table->string('description');
            $table->string('logoUrl');
            $table->string('faveIcon');
            $table->string('color1');
            $table->string('color2');
            $table->string('color3');
            $table->unsignedBigInteger('template-id');
            $table->timestamps();


            $table->foreign('template_id')
                  ->references('id')
                  ->on('template')
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
        Schema::dropIfExists('user_input');
    }
};
