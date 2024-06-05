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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('travel_number', 100);
            $table->string('travel_type', 100);
            $table->integer('travel_capacity');
            $table->string('departure', 100);
            $table->string('destination', 100);
            $table->string('departure_time', 5);
            $table->string('arrival_time', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
