<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->increments('id');
            $table->text('path');
            $table->string('extension');
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('subtitles_id')->nullable();
            $table->unsignedInteger('content_id')->nullable();
            $table->unsignedInteger('episode_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('content_id')->references('id')->on('contents');
            $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade');
            $table->foreign('subtitles_id')->references('id')->on('languages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('others');
    }
}
