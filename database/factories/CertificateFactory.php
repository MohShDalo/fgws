<?php

namespace Database\Factories;
use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CertificateFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Certificate::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'course_title'=>Str::random(15),
			'hours'=>Str::random(15),
			'start_date'=>now(),
			'end_date'=>now(),
			'organizer'=>Str::random(15),
			'category'=>Str::random(15),
			'file'=>Str::random(15),
			'show'=>false,
			'note'=>Str::random(15),
			// $certificate->freelancer_id = null,
		];
	}
}
