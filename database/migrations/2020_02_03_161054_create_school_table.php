<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
   
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('principal');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->integer('address_id')->index('fk_school_address1');
            $table->integer('user_id')->index('fk_school_user1');
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
        Schema::dropIfExists('school');
    }
}
