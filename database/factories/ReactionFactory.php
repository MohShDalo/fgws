<?php

namespace Database\Factories;
use App\Models\Reaction;
use App\Models\Chat;
use App\Models\User;
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
			'type'=>Reaction::TYPE_LIKE,
			'post_id'=>Post::factory(),
			'created_by_id'=>User::factory(),
			// $reaction->created_by_id = null,
			// $reaction->post_id = null,
		];
	}
}
