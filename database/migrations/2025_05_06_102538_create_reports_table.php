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
            $table->enum('type', ['taxi', 'emergency']);
            $table->text('date'); // YYYY-MM-DD, date of the report, usefull for taxi rides

            $table->text('report_status');

            $table->string('street_name');
            $table->integer('house_number');
            $table->string('postal_code');
            $table->string('city'); // Home town/city/etc.
            // Needed for filtering data
            $table->string('municipality');

            $table->boolean('rijkswaterstaat_called');

            // Using nullOnDelete() to not wipe the report if user or caller entries are deleted, preventing data loss
            $table->foreignId('user_id')->constrained('users')->nullOnDelete(); // Linked to callcenter user who took up the report
            $table->foreignId('caller_id')->constrained('callers')->nullOnDelete();
            $table->foreignId('animal_id');
            $table->foreignId('payment_id');
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
