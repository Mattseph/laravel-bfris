<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Voter;
use App\Models\Resident;
use App\Models\Disability;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;
use App\Models\EmergencyContact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if (Resident::count() == 0) {
            Resident::factory(10)->create([
                'image' => 'uploads/default-img.svg'
            ]);
        }

        if (Voter::count() == 0) {
            $this->call(VoterSeeder::class);
        }

        if (Disability::count() == 0) {
            $this->call(DisabilitySeeder::class);
        }

        if (Vaccination::count() == 0) {
            $this->call(VaccinationSeeder::class);
        }

        if (EmergencyContact::count() == 0) {
            $this->call(EmergencyContactSeeder::class);
        }
    }
}
