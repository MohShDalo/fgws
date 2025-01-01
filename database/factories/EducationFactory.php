<?php

namespace Database\Factories;
use App\Models\Education;
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
			'title'=>Str::random(15),
			'score'=>Str::random(15),
			'show_score'=>false,
			'start_date'=>now(),
			'end_date'=>now(),
			'organizer'=>Str::random(15),
			'category'=>Str::random(15),
			'special_rank'=>Str::random(15),
			'note'=>Str::random(15),
			// $education->freelancer_id = null,
		];
	}
}
