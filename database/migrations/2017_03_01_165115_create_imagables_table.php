<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagablesTable extends Migration 
{

	public function up()
	{
		Schema::create('imagables', function (Blueprint $table) {

			$table->increments('id');
            $table->unsignedInteger('image_id');
            $table->string('imagable_type');
            $table->unsignedInteger('imagable_id');    
            
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	public function down()
	{
		Schema::drop('imagables');
	}

}
