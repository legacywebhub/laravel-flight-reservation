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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->foreignId('user_id')->onDelete('RESTRICT')->nullable();
            //$table->boolean('is_anonymous')->default(false);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('gender')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['reserved', 'purchased', 'cancelled'])->default('reserved');
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
