<?php

namespace Database\Factories;
use App\Models\Education;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EducationFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Education::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title'=>$this->faker->sentence(),
			'score'=>$this->faker->numberBetween(10, 100),
			'show_score'=>true,
			'start_date'=>now(),
			'end_date'=>null,
			'organizer'=>$this->faker->word(),
			'category'=>Education::CATEGORY_TECHNICAL,
			'special_rank'=>null,
			'note'=>null,
			// $education->freelancer_id = null,
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
