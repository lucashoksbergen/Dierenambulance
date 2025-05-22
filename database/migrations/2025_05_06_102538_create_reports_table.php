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

            // Using nullOnDelete() to not wipe the report if user or caller entries are deleted, preventing data loss
            // Linked to the call-center user who took the report
            $table->foreignId('user_id')->constrained('users')->nullOnDelete();
            // Linked to the caller who called in for the report
            $table->foreignId('caller_id')->constrained('callers')->nullOnDelete();

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
