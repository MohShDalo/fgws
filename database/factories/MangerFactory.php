<?php

namespace Database\Factories;
use App\Models\Manger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MangerFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Manger::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'company_name'=>$this->faker->sentence(),
			'company_objectives'=>$this->faker->text(500),
			'company_employees'=>$this->faker->text(100),
		];
	}
}
