<?php

namespace Database\Factories;

use App\Models\Resident;
use App\Models\Disability;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disability>
 */
class DisabilityFactory extends Factory
{
    protected $model = Disability::class;
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
            'is_disabled' => fake()->boolean(),
            'disability_type' => fake()->randomElement(['Physical','Sensory', 'Cognitive', 'Mental', 'Chronic']),
        ];
    }
}
