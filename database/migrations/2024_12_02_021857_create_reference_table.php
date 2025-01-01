<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('references', function (Blueprint $table) {
			$table->id();
			$table->string("full_name")->nullable();
			$table->string("contact_number")->nullable();
			$table->string("email")->nullable();
			$table->string("postion")->nullable();
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
		Schema::dropIfExists('references');
	}
}
