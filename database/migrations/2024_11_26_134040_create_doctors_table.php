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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->unsignedBigInteger('user_id'); // Foreign key to Users table
            $table->string('specialization');
            $table->string('medical_license_number')->unique();
            $table->date('license_expiry_date');
            $table->integer('years_of_experience')->nullable();
            $table->text('bio')->nullable();
            $table->json('available_days')->nullable();
            $table->time('available_from')->nullable();
            $table->time('available_to')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('photo')->nullable();
            $table->decimal('rating', 2, 1)->default(0); // Example: 4.5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
