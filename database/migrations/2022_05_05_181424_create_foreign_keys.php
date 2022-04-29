<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tankers', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						
		});

        Schema::table('stations', function(Blueprint $table) {
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						
		});

        Schema::table('loads', function(Blueprint $table) {
			$table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('tanker_id')->references('id')->on('tankers')->onDelete('cascade');
						
		});

		Schema::table('feeds', function(Blueprint $table) {
			$table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						
		});


	}

	public function down()
	{
		Schema::table('tankers', function(Blueprint $table) {
			$table->dropForeign('tankers_user_id_foreign');
		});

        Schema::table('stations', function(Blueprint $table) {
			$table->dropForeign('stations_location_id_foreign');
		});

        Schema::table('loads', function(Blueprint $table) {
			$table->dropForeign('loads_station_id_foreign');
            $table->dropForeign('loads_tanker_id_foreign');
		});
       
	}
}
