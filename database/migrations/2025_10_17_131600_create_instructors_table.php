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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable(); // e.g., "Lead Instructor", "Founder"
            $table->string('image'); // Path to instructor photo
            $table->string('location')->nullable(); // Location they primarily teach at
            $table->string('email')->nullable();
            $table->text('bio')->nullable(); // Short bio for display
            $table->longText('description')->nullable(); // Full description (not shown yet)
            $table->integer('order')->default(0); // Display order
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
