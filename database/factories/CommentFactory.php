<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Comment::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>$this->faker->paragraph(),
			'post_id'=>$this->faker->numberBetween(1, 4),
			'created_by_id'=>$this->faker->numberBetween(1, 4),
			// 'post_id'=>Post::factory(),
			// 'created_by_id'=>User::factory(),
			// $comment->created_by_id = null,
			// $comment->post_id = null,
		];
	}
}
