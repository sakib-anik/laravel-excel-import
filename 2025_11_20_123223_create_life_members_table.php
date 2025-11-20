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
        Schema::create('life_members', function (Blueprint $table) {
            $table->id();

            // Official Life Member Number (Unique)
            $table->integer('lm_no')->unique();

            // Member Name
            $table->string('name', 255);

            // Status (Active, Inactive, Deceased, etc.)
            $table->string('status', 50)->nullable();

            // Additional remarks regarding status
            $table->text('status_remarks')->nullable();

            // Whether the member is abroad (0 = No, 1 = Yes)
            $table->boolean('is_abroad')->default(false);

            // Full address (can be long)
            $table->text('address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_members');
    }
};
