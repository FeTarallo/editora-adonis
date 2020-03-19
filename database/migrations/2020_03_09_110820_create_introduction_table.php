<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroductionTable extends Migration
{

    public function up()
    {
        Schema::create('introduction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('writer_name');
            $table->string('writer_about');
            $table->string('illustrator_name');
            $table->string('illustrator_about');
            $table->string('writer_image');
            $table->string('illustrator_image');
            $table->integer('book_id')->index('fk_introduction_book1');
        });
    }

    public function down()
    {
        Schema::dropIfExists('introduction');
    }
}
