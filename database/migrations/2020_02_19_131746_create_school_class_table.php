<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassTable extends Migration
{
    
    public function up()
    {
        Schema::create('school_class', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('period');
            $table->integer('course');
            $table->string('serie');
            $table->integer('year');
            $table->string('teacher');
            $table->integer('school_id')->index('fk_school_class_school1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_class');
    }
}
