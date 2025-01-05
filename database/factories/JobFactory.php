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
			'content'=>$this->faker->sentence(),
			'needed_postion'=>$this->faker->word(),
			'max_price'=>0,
			'max_time'=>0,
			'expected_start_date'=>now(),
			'owner_id'=>1,
			// $job->worker_id = null,
			// $job->owner_id = null,
		];
	}
}
