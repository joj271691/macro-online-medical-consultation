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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            
            $table->decimal('amount', 8, 2); // Payment amount
            $table->string('payment_method'); // Payment method (e.g., 'credit card', 'paypal')
            $table->string('payment_status'); // Payment status (e.g., 'pending', 'completed', 'failed')
            $table->timestamp('payment_date')->nullable();
            $table->string('transaction_id')->unique(); // Unique transaction ID from payment gateway
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
