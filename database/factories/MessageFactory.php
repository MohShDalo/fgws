<?php

namespace Database\Factories;
use App\Models\Message;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Message::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>$this->faker->sentence(),
			'chat_id'=>Chat::factory(),
			'created_by_id'=>User::factory(),
			// $message->created_by_id = null,
			// $message->chat_id = null,
		];
	}
}
