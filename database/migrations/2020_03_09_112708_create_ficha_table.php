<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTable extends Migration
{

    public function up()
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('writer_name');
            $table->string('writer_lastname');
            $table->string('illustrator_name');
            $table->string('illustrator_lastname');
            $table->string('reviewer_name');
            $table->string('reviewer_lastname');
            $table->integer('book_id')->index('fk_ficha_book1');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ficha');
    }
}
