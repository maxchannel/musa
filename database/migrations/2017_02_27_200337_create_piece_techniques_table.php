<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceTechniquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_techniques', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned();
			$table->integer('technique_id')->unsigned();

			$table->foreign('piece_id')->references('id')->on('pieces');
			$table->foreign('technique_id')->references('id')->on('techniques');
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
		Schema::drop('piece_techniques');
	}

}
