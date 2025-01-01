<?php

namespace Database\Factories;
use App\Models\Portfolio;
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
			'title'=>Str::random(15),
			'release_date'=>now(),
			'link'=>Str::random(15),
			'categry'=>Str::random(15),
			'mockup_image'=>Str::random(15),
			'file'=>Str::random(15),
			'note'=>Str::random(15),
			// $portfolio->freelancer_id = null,
		];
	}
}
