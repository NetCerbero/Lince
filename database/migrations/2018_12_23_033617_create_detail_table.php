<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Detail', function (Blueprint $table) {
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('content_id');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('content_id')->references('id')->on('contents');
            $table->primary(['genre_id','content_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
