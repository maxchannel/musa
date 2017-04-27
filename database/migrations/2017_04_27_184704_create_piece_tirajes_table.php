<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceTirajesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_tirajes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('contenido');
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
		Schema::drop('piece_tirajes');
	}

}
