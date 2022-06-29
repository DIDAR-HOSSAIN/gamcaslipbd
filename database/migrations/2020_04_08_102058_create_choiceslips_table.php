<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoiceslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choiceslips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_name');
            $table->string('center_name')->nullable();
            $table->string('traveling_country');
            $table->string('visa_type');
            $table->string('mob_no');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('passport_image')->nullable();
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
        Schema::dropIfExists('choiceslips');
    }
}
