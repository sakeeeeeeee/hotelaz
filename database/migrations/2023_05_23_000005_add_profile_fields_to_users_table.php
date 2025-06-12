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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email');
            $table->string('address')->nullable()->after('phone_number');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->string('postal_code')->nullable()->after('country');
            $table->date('date_of_birth')->nullable()->after('postal_code');
            $table->string('profile_picture')->nullable()->after('date_of_birth');
            $table->boolean('is_admin')->default(false)->after('profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone_number',
                'address',
                'city',
                'country',
                'postal_code',
                'date_of_birth',
                'profile_picture',
                'is_admin',
            ]);
        });
    }
}; 