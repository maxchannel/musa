<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesTable extends Migration 
{

	public function up()
	{
		Schema::create('pieces', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('year');
            $table->integer('elements')->default(1);
            $table->integer('price');
            $table->text('description');
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('loan');

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('pieces');
	}

}
