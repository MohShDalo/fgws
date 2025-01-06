<?php

namespace Database\Factories;
use App\Models\Portfolio;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PortfolioFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Portfolio::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title'=>$this->faker->sentence(),
			'release_date'=>NULL,
			'link'=>NULL,
			'category'=>Portfolio::CATEGORY_TECHNICAL,
			'mockup_image'=>NULL,
			'file'=>NULL,
			'note'=>NULL,
			// $portfolio->freelancer_id = null,
			'freelancer_id'=>Freelancer::factory(),
		];
	}
}
