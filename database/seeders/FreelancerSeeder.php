<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Freelancer;

class FreelancerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Freelancer::factory()
		->count(3)
		->create();
	}
}
