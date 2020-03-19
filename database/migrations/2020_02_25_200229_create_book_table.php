<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{

    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sinopse');
            $table->string('cover');
            $table->integer('school_class_id')->index('fk_book_school_class1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book');
    }
}
