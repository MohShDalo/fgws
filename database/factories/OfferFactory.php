<?php

namespace Database\Factories;
use App\Models\Offer;
use App\Models\Job;
use App\Models\Freelancer;
use App\Models\Manger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Offer::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>$this->faker->sentence(),
			'price'=>$this->faker->numberBetween(500, 1000),
			'time'=>$this->faker->numberBetween(10, 40),
			'status'=>Offer::STATUS_PENDING,
			'status_reason'=>$this->faker->sentence(),
            'job_id'=> $this->faker->numberBetween(1, 2),
            'owner_id'=>Freelancer::factory(),
            // 'job_id'=>Job::factory(),
		];
	}
}
