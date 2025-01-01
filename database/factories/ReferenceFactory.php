<?php

namespace Database\Factories;
use App\Models\Reference;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReferenceFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Reference::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'full_name'=>Str::random(15),
			'contact_number'=>Str::random(15),
			'email'=>Str::random(15),
			'postion'=>Str::random(15),
			'note'=>Str::random(15),
			// $reference->freelancer_id = null,
		];
	}
}
