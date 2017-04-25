<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceSignaturesTable extends Migration 
{

	public function up()
	{
		Schema::create('piece_signatures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firm');
			$table->integer('piece_id')->unsigned();

			$table->foreign('piece_id')->references('id')->on('pieces');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('piece_signatures');
	}

}
