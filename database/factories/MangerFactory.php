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
			'company_name'=>Str::random(15),
			'company_objectives'=>Str::random(15),
			'company_employees'=>Str::random(15),
		];
	}
}
