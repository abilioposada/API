<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorsFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition () : Array
	{
		return [
			"name"			=> $this->faker->name(),
			"nationality"	=> $this->faker->country(),
			"gender"		=> $this->faker->randomElement( [ 'M', 'F', 'O' ] ),
			"date_of_birth"	=> $this->faker->optional( 0.9 )->dateTime( $max = "now" )
		];
	}
}
