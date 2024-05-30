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
        Schema::create('seat_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id', 60)->unique();
            $table->foreignId('seat_id')->unique()->onDelete('RESTRICT');
            $table->foreignId('payment_id')->unique()->onDelete('RESTRICT');
            $table->foreignId('user_id')->onDelete('RESTRICT')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('gender')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['null', 'reserved', 'purchased', 'cancelled'])->default('reserved');
            $table->timestamp('date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_bookings');
    }
};
