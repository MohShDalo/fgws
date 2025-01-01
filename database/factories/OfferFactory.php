<?php

namespace Database\Factories;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
	/**
	* The name of the factory's corresponding model.
	*
	* @var string
	*/
	protected $model = Offer::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'content'=>Str::random(15),
			'price'=>0,
			'time'=>0,
			'status'=>Str::random(15),
			'status_reason'=>Str::random(15),
			// $offer->owner_id = null,
			// $offer->job_id = null,
		];
	}
}
