<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationsTable extends Migration
{

	public function up()
	{
		Schema::create('user_notifications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('m');
            $table->integer('user_id')->unsigned();
            $table->boolean('v');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('user_notifications');
	}

}
