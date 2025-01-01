<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function (Blueprint $table) {
			$table->id();
			$table->string("content",1000)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("created_by_id")->index();
			$table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger("chat_id")->index();
			$table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('messages');
	}
}
