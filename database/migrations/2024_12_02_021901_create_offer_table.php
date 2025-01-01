<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function (Blueprint $table) {
			$table->id();
			$table->string("content",1000)->nullable();
			$table->integer("price")->nullable();
			$table->integer("time")->nullable();
			$table->string("status")->nullable();
			$table->string("status_reason")->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("owner_id")->index();
			$table->foreign('owner_id')->references('id')->on('freelancers')->onDelete('cascade');
			$table->unsignedBigInteger("job_id")->index();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('offers');
	}
}
