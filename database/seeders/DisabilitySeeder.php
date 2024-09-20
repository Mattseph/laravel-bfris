<?php

namespace Database\Seeders;

use App\Models\Disability;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Disability::factory(10)->create();
    }
}
