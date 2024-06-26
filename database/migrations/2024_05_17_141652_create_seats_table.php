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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->onDelete('CASCADE');
            $table->string('seat_number');
            $table->enum('seat_class', ['economy', 'premium economy', 'business', 'first class'])->default('economy');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['available', 'reserved', 'booked'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
