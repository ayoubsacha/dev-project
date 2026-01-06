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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // manager_id points to users table (the Technical Manager)
            $table->foreignId('manager_id')->constrained('users')->onDelete('cascade');

            $table->string('name');
            $table->string('model_number')->nullable();
            $table->string('serial_number')->unique();
            $table->json('specs'); // Data like: {"ram": "32GB", "cpu": "Intel Xeon"}
            $table->string('location'); // e.g., Rack 4, Row B

            $table->enum('status', ['available', 'maintenance', 'deactivated'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
