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
        Schema::table('timetables', function (Blueprint $table) {
     
            $table->foreignId('class_id')->constrained()->onDelete('cascade')->nullable()->change(); 
            $table->foreignId('day_id')->constrained()->onDelete('cascade')->nullable()->change(); 
            $table->foreignId('subject_id')->constrained()->onDelete('cascade')->nullable()->change(); 
            $table->string('start_time')->nullable()->change();
            $table->string('end_time')->nullable()->change();
            $table->string('room_no')->nullable()->change();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timetables', function (Blueprint $table) {
     
            $table->foreignId('class_id')->constrained()->onDelete('cascade')->change(); 
            $table->foreignId('day_id')->constrained()->onDelete('cascade')->change(); 
            $table->foreignId('subject_id')->constrained()->onDelete('cascade')->change(); 
            $table->string('start_time')->change();
            $table->string('end_time')->change();
            $table->string('room_no')->change();
           
        });
    }
};
