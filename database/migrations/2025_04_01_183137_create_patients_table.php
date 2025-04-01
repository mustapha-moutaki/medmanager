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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']); // Fixed typo
            $table->string('CNSS')->nullable();
            $table->string('insurance')->nullable();
            $table->enum('patient_type', ['outpatient', 'inpatient', 'emergency'])->nullable();
            $table->date('registration_date')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
