<?php

namespace Database\Factories;

use App\Models\Resident;
use App\Models\EmergencyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyContact>
 */
class EmergencyContactFactory extends Factory
{

    protected $model = EmergencyContact::class;
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
            'name' => fake()->unique()->name(),
            'relationship' => fake()->randomElement(['Mother', 'Father', 'Sibling', 'Cousin']),
            'address' => fake()->address(),
            'contact' => fake()->unique()->phoneNumber(),
        ];
    }
}
