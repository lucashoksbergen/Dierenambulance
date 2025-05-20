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
        // Types are probably not correct, this is temporary anyway, these should be stored in other tables eventually
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dog', 'cat', 'bird', 'other']);
            $table->string('otherkind')->nullable();
            $table->string('breed');
            $table->string('color');
            $table->enum('gender', ['male', 'female', 'ex-male', 'unknown']);
            $table->enum('condition', ['injured', 'sick', 'stray', 'young', 'weakened', 'dead', 'other']);
            $table->string('chipnumber')->nullable();
            $table->boolean('registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
