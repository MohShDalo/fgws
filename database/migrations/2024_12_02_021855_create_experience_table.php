<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiences', function (Blueprint $table) {
			$table->id();
			$table->string("postion")->nullable();
			$table->string("company_name")->nullable();
			$table->string("company_address")->nullable();
			$table->datetime("start_date")->nullable();
			$table->datetime("end_date")->nullable();
			$table->string("category")->nullable();
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
		Schema::dropIfExists('experiences');
	}
}
