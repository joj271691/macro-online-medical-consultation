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
        Schema::table('users', function (Blueprint $table) {
            $table->string('specialization')->nullable(); // Doctor's specialization
            $table->string('medical_license_number')->unique()->nullable(); // Medical license number
            $table->date('license_expiry_date')->nullable(); // License expiry date
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['specialization', 'medical_license_number', 'license_expiry_date']);
        });
    }
};
