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
            $table->foreignId('booking_id')->unique()->onDelete('CASCADE');
            $table->string('reference_id');
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_date');
            $table->enum('payment_method', ['card', 'cash', 'transfer', 'cryptocurrency'])->default('card');
            $table->enum('payment_status', ['pending', 'successful', 'failed'])->default('pending');
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
