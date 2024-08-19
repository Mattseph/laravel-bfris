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
        Schema::create('voters', function (Blueprint $table) {
            $table->id('voter_id');
            $table->string('voter_number')->nullable();
            $table->unsignedBigInteger('resident_id');
            $table->foreign('resident_id')
                ->references('resident_id')
                ->on('residents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('voter_status');
            $table->string('precinct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
