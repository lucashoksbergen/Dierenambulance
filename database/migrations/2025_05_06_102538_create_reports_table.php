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

            // Linked to the user who took the report
            $table->foreignId('user_id');

            // Linked to information of driver(s) and vehicle that will be sent to the report
            $table->foreignId('driver_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('codriver_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();

            // Caller information
            $table->string('caller_name');
            $table->integer('caller_phone_number');
            $table->text('description')->nullable();
            $table->string('street_name');
            $table->integer('house_number');
            $table->string('postal_code');
            $table->string('city'); // Home town/city/etc.
            $table->string('municipality');

            // Animal information
            $table->foreignId('animal_id'); // Linked to Animal Table
            $table->text('report_status');
            $table->boolean('rijkswaterstaat_called');
            $table->foreignId('payment_id'); // Linked to Payment table
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
