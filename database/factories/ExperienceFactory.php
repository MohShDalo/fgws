<?php

namespace Database\Factories;
use App\Models\Experience;
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
			'postion'=>Str::random(15),
			'company_name'=>Str::random(15),
			'company_address'=>Str::random(15),
			'start_date'=>now(),
			'end_date'=>now(),
			'category'=>Str::random(15),
			'note'=>Str::random(15),
			// $experience->freelancer_id = null,
		];
	}
}
