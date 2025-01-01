<?php

namespace Database\Factories;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Job::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>Str::random(15),
			'needed_postion'=>Str::random(15),
			'max_price'=>0,
			'max_time'=>0,
			'expected_start_date'=>now(),
			// $job->worker_id = null,
			// $job->owner_id = null,
		];
	}
}
