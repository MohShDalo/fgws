<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manger;

class MangerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Manger::factory()
		->count(3)
		->create();
	}
}
