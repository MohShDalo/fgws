<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;

class ChatSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Chat::factory()
		->count(3)
		->create();
	}
}
