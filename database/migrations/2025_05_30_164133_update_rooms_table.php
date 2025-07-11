<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add new columns without constraints first
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('room_number')->after('name')->nullable();
            $table->string('type')->after('room_number')->default('standard');
            $table->json('features')->after('capacity')->nullable();
            $table->string('featured_image')->after('features')->nullable();
            $table->json('gallery_images')->after('featured_image')->nullable();
            $table->integer('quantity')->default(1)->after('status');
        });
        
        // Update existing records with generated room numbers
        $rooms = DB::table('rooms')->get();
        foreach ($rooms as $room) {
            DB::table('rooms')
                ->where('id', $room->id)
                ->update([
                    'room_number' => 'RM' . str_pad($room->id, 3, '0', STR_PAD_LEFT),
                    // Convert existing features to JSON
                    'features' => json_encode([
                        $room->has_wifi ? 'wifi' : null,
                        $room->has_ac ? 'ac' : null,
                        $room->has_tv ? 'tv' : null,
                    ]),
                    'featured_image' => $room->image
                ]);
        }
        
        // Now add unique constraint
        Schema::table('rooms', function (Blueprint $table) {
            $table->unique('room_number');
            $table->dropColumn(['bed_type', 'has_wifi', 'has_ac', 'has_tv', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Add back old columns
            $table->string('bed_type')->after('capacity')->nullable();
            $table->boolean('has_wifi')->default(false)->after('bed_type');
            $table->boolean('has_ac')->default(false)->after('has_wifi');
            $table->boolean('has_tv')->default(false)->after('has_ac');
            $table->string('image')->nullable();
            
            // Remove new columns
            $table->dropColumn(['room_number', 'type', 'features', 'featured_image', 'gallery_images']);
            $table->dropColumn('quantity');
        });
    }
};
