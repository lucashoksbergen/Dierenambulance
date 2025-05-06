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
        Schema::create('vehicle_swap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_volunteer_old');
            $table->unsignedBigInteger('vehicle_volunteer_new');
            $table->boolean('materials_check');
            $table->integer('cash');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_swap');
    }
};
