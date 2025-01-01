<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function (Blueprint $table) {
			$table->id();
			$table->string("content",1000)->nullable();
			$table->string("needed_postion")->nullable();
			$table->integer("max_price")->nullable();
			$table->integer("max_time")->nullable();
			$table->datetime("expected_start_date")->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("worker_id")->index();
			$table->foreign('worker_id')->references('id')->on('freelancers')->onDelete('cascade');
			$table->unsignedBigInteger("owner_id")->index();
			$table->foreign('owner_id')->references('id')->on('mangers')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('jobs');
	}
}
