<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chats', function (Blueprint $table) {
			$table->id();
			$table->string("title")->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("first_member_id")->index();
			$table->foreign('first_member_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger("second_member_id")->index();
			$table->foreign('second_member_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger("created_by_id")->index();
			$table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('chats');
	}
}
