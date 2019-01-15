<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('host')->nullable();
            $table->text('response')->nullable();
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('response_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('response_id')->references('id')->on('responses');
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
        Schema::dropIfExists('response_clients');
    }
}
