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
        Schema::create('disabilities', function (Blueprint $table) {
            $table->id('disability_id'); // Primary key column
            $table->unsignedBigInteger('resident_id'); // Define as unsigned integer
            $table->foreign('resident_id')
                  ->references('resident_id')
                  ->on('residents')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->boolean('is_disabled');
            $table->string('disability_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disablilities');
    }
};
