<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceBasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_bases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned();
			$table->string('material');
			$table->integer('height');
			$table->integer('width');
			$table->integer('long');
			
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
		Schema::drop('piece_bases');
	}

}
