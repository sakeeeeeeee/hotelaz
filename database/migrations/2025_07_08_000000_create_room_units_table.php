<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->string('room_number');
            $table->string('status')->default('available'); // available, booked, maintenance
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_units');
    }
}; 