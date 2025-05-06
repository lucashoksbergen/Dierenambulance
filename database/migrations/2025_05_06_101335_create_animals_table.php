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
            $table->unsignedBigInteger('owner_id');
            $table->string('condition');
            $table->string('type');
            $table->string('race')->nullable();
            $table->string('gender');
            $table->text('description');
            $table->string('chip_number'); // Probably int instead
            $table->boolean('registered');
            $table->string('registered_at');
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
