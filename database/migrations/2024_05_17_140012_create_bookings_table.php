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
            $table->foreignId('user_id')->constrained()->onDelete('RESTRICT');
            $table->foreignId('flight_id')->constrained()->onDelete('RESTRICT');
            $table->unsignedSmallInteger('number_of_seats');
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
