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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->enum('condition', ['hurt', 'healthy', 'sick', 'dead', 'stray', 'young', 'unknown']);
            $table->enum('type', ['dog', 'cat', 'bird', 'other']);
            $table->string('race')->nullable();
            $table->enum('gender', ['male', 'female', 'neutered', 'unknown']);
            $table->text('description');
            $table->bigInteger('chip_number'); // Can store up to 19 digits, chip number requires 15
            $table->boolean('registered');
            $table->string('registered_at'); // place 
            // Do we need a name?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
