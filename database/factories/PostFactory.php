<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Post::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>$this->faker->text(1000),
			'image'=>null,
            // 'owner_id'=> $this->faker->numberBetween(1, 2),
            'owner_id'=>Freelancer::factory(),
			// $post->owner_id = null,
		];
	}
}
