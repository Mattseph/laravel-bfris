<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'midname' => fake()->lastName(),
            'suffix' => fake()->suffix(),
            'sex' => fake()->suffix(),
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'place_of_birth' => fake()->city(),
            'civil_status' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'nationality' => fake()->country(),
            'occupation' => fake()->jobTitle(),
            'religion' => fake()->lastName(),
            'blood_type' => fake()->jobTitle(),
            'educational_attainment' => fake()->jobTitle(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'tel_number' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'purok' => fake()->streetName(),
            'barangay' => fake()->secondaryAddress(),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'fourps_status' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'date_of_death' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'image' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
