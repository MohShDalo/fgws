<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificates', function (Blueprint $table) {
			$table->id();
			$table->string("course_title")->nullable();
			$table->string("hours")->nullable();
			$table->datetime("start_date")->nullable();
			$table->datetime("end_date")->nullable();
			$table->string("organizer")->nullable();
			$table->string("category")->nullable();
			$table->string("file")->nullable();
			$table->boolean("show")->nullable();
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
		Schema::dropIfExists('certificates');
	}
}
