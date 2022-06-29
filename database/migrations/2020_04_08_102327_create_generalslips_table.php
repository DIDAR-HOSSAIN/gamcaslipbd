<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalslips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_name');
            $table->string('traveling_country');
            $table->string('visa_type');
            $table->string('mob_no');
            $table->string('passport_image');
            $table->string('gender');
            $table->string('marital_status');
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
        Schema::dropIfExists('generalslips');
    }
}
