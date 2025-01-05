<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolios', function (Blueprint $table) {
			$table->id();
			$table->string("title")->nullable();
			$table->datetime("release_date")->nullable();
			$table->string("link")->nullable();
			$table->string("categry")->nullable();
			$table->string("mockup_image")->nullable();
			$table->string("file")->nullable();
			$table->string("note",1000)->nullable();
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
		Schema::dropIfExists('portfolios');
	}
}
