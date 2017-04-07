<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceValuationsTable extends Migration 
{
	public function up()
	{
		Schema::create('piece_valuations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('valuation');
			$table->string('currency');
			$table->integer('piece_id')->unsigned();
			
			$table->foreign('piece_id')->references('id')->on('pieces');
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
		Schema::drop('piece_valuations');
	}

}
