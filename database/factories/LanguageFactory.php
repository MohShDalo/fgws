<?php

namespace Database\Factories;
use App\Models\Language;
use App\Models\Freelancer;
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
			'language'=>["Arabic","English","Franch","Turkish",][$this->faker->numberBetween(0, 3)],
			'category'=>Language::CATEGORY_TECHNICAL,
			'general_score'=>$this->faker->numberBetween(70, 100),
			'speaking_score'=>$this->faker->numberBetween(70, 100),
			'writing_score'=>$this->faker->numberBetween(70, 100),
			'listening_score'=>$this->faker->numberBetween(70, 100),
			'show_details'=>true,
			'note'=>null,
			// $language->freelancer_id = null,
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
