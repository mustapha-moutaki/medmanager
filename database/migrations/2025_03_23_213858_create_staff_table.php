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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('specialties', ['Cardiology', 'Emergency', 'Pediatric', 'Intensive Care', 'Oncology', 'Maternity', 'Surgical', 'Psychiatric', 'General']);
            $table->integer('years_of_experience')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('license_number')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->enum('shift_preference', ['Morning', 'Evening', 'Night', 'Rotating'])->nullable();
            $table->enum('employment_status', ['full_time', 'part_time', 'contract'])->nullable();
            $table->string('emergency_contact_phone', 15)->nullable();
            $table->enum('role', ['nurse', 'receptionist', 'technician', 'other']);

            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuff');
    }
};
