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
        Schema::create('assign_teacher_to_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained()->onDelete('cascade'); // Ensure classes table exists
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // Ensure subjects table exists
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Ensure teachers table exists
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_teacher_to_classes');
    }
};