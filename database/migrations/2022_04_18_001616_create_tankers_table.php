<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tankers', function (Blueprint $table) {
            $table->id();
            $table->integer('car_number');
            $table->double('capacity');
            $table->bigInteger('user_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('tankers');
    }
};
