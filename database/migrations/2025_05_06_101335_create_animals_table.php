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
            $table->foreignId('owner_id')->nullable(); // Nullable, because the animal can be a stray

            $table->enum('type', ['dog', 'cat', 'bird', 'other']);
            $table->string('other_type')->nullable(); // Used if type is 'other'

            $table->string('race')->nullable();
            $table->enum('gender', ['male', 'female', 'ex-male', 'unknown']);
            $table->text('description');
            $table->bigInteger('chip_number'); // Can store up to 19 digits, chip number requires 15
            $table->boolean('registered');
            $table->string('registered_at'); // place 
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
