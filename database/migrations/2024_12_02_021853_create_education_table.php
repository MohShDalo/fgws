<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('educations', function (Blueprint $table) {
			$table->id();
			$table->string("title")->nullable();
			$table->string("score")->nullable();
			$table->boolean("show_score")->nullable();
			$table->datetime("start_date")->nullable();
			$table->datetime("end_date")->nullable();
			$table->string("organizer")->nullable();
			$table->string("category")->nullable();
			$table->string("special_rank")->nullable();
			$table->string("note")->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unsignedBigInteger("freelancer_id")->index();
			$table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('educations');
	}
}
