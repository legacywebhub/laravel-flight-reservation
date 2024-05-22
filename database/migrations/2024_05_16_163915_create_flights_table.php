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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained()->onDelete('RESTRICT');
            $table->foreignId('origin_id')->constrained()->onDelete('RESTRICT');
            $table->foreignId('destination_id')->constrained()->onDelete('RESTRICT');
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('available_seats')->default(100);
            $table->enum('status', [
                'available',
                'booked',
                'taken_off',
                'landed',
                'cancelled'
            ])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
