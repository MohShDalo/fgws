<?php

namespace Database\Factories;
use App\Models\Certificate;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CertificateFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Certificate::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'course_title'=>$this->faker->sentence(),
			'hours'=>$this->faker->numberBetween(40, 80),
			'start_date'=>now()->sub('P4M'),
			'end_date'=>now(),
			'organizer'=>$this->faker->sentence(),
			'category'=>Certificate::CATEGORY_TECHNICAL,
			'file'=>NULL,
			'show'=>true,
			'note'=>$this->faker->sentence(),
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
