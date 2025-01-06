<?php

namespace Database\Factories;
use App\Models\Reference;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReferenceFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Reference::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'full_name'=>$this->faker->sentence(),
			'contact_number'=>$this->faker->numberBetween(591000000, 599999999),
			'email'=>$this->faker->unique()->safeEmail,
			'postion'=>$this->faker->sentence(),
			'note'=>$this->faker->sentence(),
			// $reference->freelancer_id = null,
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
