<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string("name")->nullable();
			$table->string("image")->nullable();
			$table->string("cover")->nullable();
			$table->string("email")->nullable();
			$table->string("contact_number")->nullable();
			$table->datetime("birth_date")->nullable();
			$table->string("gender")->nullable();
			$table->string("marital_status")->nullable();
			$table->string("nationality")->nullable();
			$table->string("city")->nullable();
			$table->string("country")->nullable();
			$table->string("address_details")->nullable();
			$table->string("roleable_type")->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
