<?php

namespace Database\Factories;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReactionFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Reaction::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'type'=>Str::random(15),
			// $reaction->created_by_id = null,
			// $reaction->post_id = null,
		];
	}
}
