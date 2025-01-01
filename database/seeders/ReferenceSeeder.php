<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reference;

class ReferenceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Reference::factory()
		->count(3)
		->create();
	}
}
