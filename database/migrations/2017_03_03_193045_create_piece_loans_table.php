<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_loans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned();
			$table->integer('institution_id')->unsigned();
			$table->date('start');
			$table->date('end');
			$table->string('manager');
			$table->string('acuerdo');
			
			$table->foreign('piece_id')->references('id')->on('pieces');
			$table->foreign('institution_id')->references('id')->on('institutions');
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
		Schema::drop('piece_loans');
	}

}
