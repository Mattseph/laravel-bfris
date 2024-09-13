<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmergencyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmergencyContact::factory(10)->create();
    }
}
