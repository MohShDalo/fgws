<?php

namespace Database\Factories;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChatFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Chat::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title'=>$this->faker->sentence(),
			'first_member_id'=>User::factory(),
			'second_member_id'=>User::factory(),
			'created_by_id'=>User::factory(),
			// $chat->first_member_id = null,
			// $chat->second_member_id = null,
			// $chat->created_by_id = null,
		];
	}
}
