<?php

namespace Database\Factories;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{

    protected $model = Resident::class;
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
            'sex' => fake()->randomElement(['Male', 'Female']),
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'place_of_birth' => fake()->city(),
            'civil_status' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'nationality' => fake()->country(),
            'occupation' => fake()->jobTitle(),
            'religion' => fake()->randomElement(['Roman Catholic', 'Iglesia ni Kristo', 'Islam']),
            'blood_type' => fake()->randomElement(['O+', 'O', 'A-', 'A+']),
            'educational_attainment' => fake()->randomElement(['College Graduate', 'College Undergraduate', 'High School Graduate', 'High School Undergraduate']),
            'phone_number' => fake()->unique()->phoneNumber(),
            'tel_number' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'purok' => fake()->streetName(),
            'barangay' => fake()->secondaryAddress(),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'is_fourps' => fake()->boolean(),
            'is_deceased' => fake()->boolean(),
            'date_of_death' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'image' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
