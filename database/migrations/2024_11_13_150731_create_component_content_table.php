<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Helper\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_content', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('userInput_id');
            $table->timestamps();

            // forgein keys
            $table->foreign('component_id')
                  ->references('id')
                  ->on('component')
                  ->onDelete('cascade');

            $table->foreign('userInput_id')
                  ->references('id')
                  ->on('user_input')
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
        Schema::dropIfExists('component_content');
    }
};
