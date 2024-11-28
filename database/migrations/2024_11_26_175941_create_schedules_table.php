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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // Primary key `id`
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Foreign key to `users` table (doctor)
            $table->date('available_date'); // The date when the doctor is available
            $table->time('available_from'); // Start time of availability
            $table->time('available_to'); // End time of availability
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); // Status of the schedule
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
