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
			'image'=>Str::random(15),
			'cover'=>Str::random(15),
			'contact_number'=>Str::random(15),
			'birth_date'=>now(),
			'gender'=>Str::random(15),
			'marital_status'=>Str::random(15),
			'nationality'=>Str::random(15),
			'city'=>Str::random(15),
			'country'=>Str::random(15),
			'address_details'=>Str::random(15),
			'roleable_type'=>null,
		];
	}
}
