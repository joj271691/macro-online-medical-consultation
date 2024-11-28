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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id(); // Primary key `id`
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade'); // Foreign key to `medical_records`
            $table->string('medicine_name'); // Name of the medicine
            $table->string('dosage'); // Dosage information for the medicine
            $table->string('duration'); // Duration of the treatment (e.g., 7 days)
            $table->text('notes')->nullable(); // Additional notes (optional)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
