<?php

namespace Database\Factories;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LanguageFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Language::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'language'=>Str::random(15),
			'category'=>Str::random(15),
			'general_score'=>0,
			'speaking_score'=>0,
			'writing_score'=>0,
			'listening_score'=>0,
			'show_details'=>false,
			'note'=>Str::random(15),
			// $language->freelancer_id = null,
		];
	}
}
