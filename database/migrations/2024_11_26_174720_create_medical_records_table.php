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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('patient_id')
            ->constrained('patients', 'patient_id') // Specify the foreign column
            ->onDelete('cascade');
      
            $table->foreignId('doctor_id') // Foreign key to users table (doctors)
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->date('record_date')->comment('Date when the record was created'); // Date of the record
            $table->text('prescription')->nullable()->comment('Prescription details');
            $table->text('diagnosis')->comment('Diagnosis details');
            $table->text('treatment')->comment('Treatment details');
            $table->text('note')->nullable()->comment('Additional notes');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
