<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesFacetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('series_facet', function(Blueprint $table) {
            $table->integer('series_id')->unsigned();
            $table->foreign('series_id')->references('id')->on('series');
            $table->integer('facet_id')->unsigned();
            $table->foreign('facet_id')->references('id')->on('facets');
            $table->enum('type', array('author', 'artist', 'tag', 'genre', 'title'));
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
        Schema::drop('series_facet');
	}

}
