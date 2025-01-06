<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = User::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
			'name'=>$this->faker->name,
			'image'=>$this->faker->sentence(),
			'cover'=>$this->faker->sentence(),
			'contact_number'=>$this->faker->sentence(),
			'birth_date'=>now(),
			'gender'=>$this->faker->sentence(),
			'marital_status'=>$this->faker->sentence(),
			'nationality'=>$this->faker->sentence(),
			'city'=>$this->faker->sentence(),
			'country'=>$this->faker->sentence(),
			'address_details'=>$this->faker->sentence(),
			'roleable_type'=>null,
		];
	}
}
