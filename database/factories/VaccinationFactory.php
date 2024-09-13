<?php

namespace Database\Factories;

use App\Models\Resident;
use App\Models\Vaccination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccination>
 */
class VaccinationFactory extends Factory
{
    protected $model = Vaccination::class;
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
            'is_vaccinated' => fake()->boolean(),
            'vaccine_1' => fake()->randomElement(['Pfizer', 'Moderna', 'Sinovac']),
            'vaccine_1_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'vaccine_2' => fake()->randomElement(['Pfizer', 'Moderna', 'Sinovac']),
            'vaccine_2_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'is_boostered' => fake()->boolean(),
            'booster_1' => fake()->randomElement(['Pfizer', 'Moderna', 'Sinovac']),
            'booster_1_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'booster_2' => fake()->randomElement(['Pfizer', 'Moderna', 'Sinovac']),
            'booster_2_date' => fake()->date($format = 'Y-m-d', $max = 'now'),

        ];
    }
}
