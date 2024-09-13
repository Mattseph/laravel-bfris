<?php

namespace Database\Factories;

use App\Models\Voter;
use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voter>
 */
class VoterFactory extends Factory
{

    protected $model = Voter::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $resident_ids = Resident::pluck('resident_id')->toArray();
        return [
            'resident_id' => fake()->randomElement($resident_ids),
            'is_voter' => fake()->boolean(),
            'voter_id' => fake()->randomNumber(9),
            'precinct' => fake()->randomElement(['4A', '12B', '11A', '11C']),

        ];
    }
}
