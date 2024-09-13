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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id('vaccine_id');
            $table->unsignedBigInteger('resident_id');
            $table->foreign('resident_id')
                ->references('resident_id')
                ->on('residents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('is_vaccinated');
            $table->string('vaccine_1')->nullable();
            $table->date('vaccine_1_date')->nullable();
            $table->string('vaccine_2')->nullable();
            $table->date('vaccine_2_date')->nullable();
            $table->boolean('is_boostered')->nullable();
            $table->string('booster_1')->nullable();
            $table->date('booster_1_date')->nullable();
            $table->string('booster_2')->nullable();
            $table->date('booster_2_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};
