<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileablesTable extends Migration 
{

	public function up()
	{
		Schema::create('fileables', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('file_id');
            $table->string('fileable_type');
            $table->unsignedInteger('fileable_id');    
            
            $table->foreign('file_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('fileables');
	}

}
