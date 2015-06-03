<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('series', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('year')->nullable();
            $table->text('description')->nullable();
            $table->integer('external_id')->unsigned()->nullable();
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
        Schema::drop('series');
	}

}
