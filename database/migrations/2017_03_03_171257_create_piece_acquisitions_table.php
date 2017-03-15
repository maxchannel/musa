<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceAcquisitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_acquisitions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned();
			$table->string('forma');
			$table->string('fecha');
			$table->integer('valuation');

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
		Schema::drop('piece_acquisitions');
	}

}
