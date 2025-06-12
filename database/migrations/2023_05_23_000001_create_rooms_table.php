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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price_per_night', 10, 2);
            $table->integer('capacity');
            $table->string('bed_type');
            $table->boolean('has_wifi')->default(false);
            $table->boolean('has_ac')->default(false);
            $table->boolean('has_tv')->default(false);
            $table->string('image')->nullable();
            $table->string('status')->default('available'); // available, booked, maintenance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
}; 