<?php

namespace Database\Factories;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FreelancerFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Freelancer::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'main_career'=>$this->faker->sentence(),
			'place_of_birth'=>$this->faker->word(),
		];
	}
}
