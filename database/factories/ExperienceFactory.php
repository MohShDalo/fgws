<?php

namespace Database\Factories;
use App\Models\Experience;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExperienceFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Experience::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'postion'=>$this->faker->word(),
			'company_name'=>$this->faker->sentence(),
			'company_address'=>$this->faker->sentence(),
			'start_date'=>now()->sub('P4M'),
			'end_date'=>now(),
			'category'=>Experience::CATEGORY_TECHNICAL,
			'note'=>$this->faker->sentence(),
			// $experience->freelancer_id = null,
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
