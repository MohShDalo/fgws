<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('languages', function (Blueprint $table) {
			$table->id();
			$table->string("language")->nullable();
			$table->string("category")->nullable();
			$table->integer("general_score")->nullable();
			$table->integer("speaking_score")->nullable();
			$table->integer("writing_score")->nullable();
			$table->integer("listening_score")->nullable();
			$table->boolean("show_details")->nullable();
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
		Schema::dropIfExists('languages');
	}
}
