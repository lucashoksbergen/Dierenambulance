<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('date'); // YYYY-MM-DD
            $table->unsignedBigInteger('user_vehicle_id'); // Linked to user_vehicle, id which is linked to driver(s) and a vehicle

            // Caller information
            $table->unsignedBigInteger('user_id'); // Linked to Volunteer Table, id of the callcenter person / referred to as call taker in figma
            $table->string('caller_name');
            $table->integer('caller_phone_number');
            $table->text('description')->nullable();
            $table->string('street_name');
            $table->integer('house_number');
            $table->string('postal_code');
            $table->string('city'); // Home town/city/etc.
            $table->string('municipality');

            // Animal information
            $table->unsignedBigInteger('animal_id'); // Linked to Animal Table
            $table->text('report_status');
            $table->boolean('rijkswaterstaat_called');
            $table->unsignedBigInteger('payment_id'); // Linked to Payment table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
