<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reactions', function (Blueprint $table) {
			$table->id();
			$table->string("type")->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("created_by_id")->index();
			$table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger("post_id")->index();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reactions');
	}
}
