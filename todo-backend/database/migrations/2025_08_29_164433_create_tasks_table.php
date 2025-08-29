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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers users.id avec suppression en cascade
            $table->foreignId('user_id')
                ->constrained() // référence la table users
                ->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed'])->default('pending');

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
