<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigIncrements('resident_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('midname')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('occupation');
            $table->string('religion');
            $table->string('blood_type')->nullable();
            $table->string('educational_attainment');
            $table->string('phone_number');
            $table->string('tel_number')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('purok');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->boolean('is_fourps')->default(false);
            $table->boolean('is_deceased')->default(false);
            $table->date('date_of_death')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
