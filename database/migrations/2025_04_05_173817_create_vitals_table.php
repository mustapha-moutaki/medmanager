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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->boolean('chills')->default(false);
            $table->integer('diastole_bp')->nullable();
            $table->integer('systole_bp')->nullable();
            $table->integer('heart_rate')->nullable();
            $table->integer('respiration_rate')->nullable();
            $table->integer('spo2')->nullable();
            $table->string('blood_group')->nullable();
            $table->decimal('temperature', 4, 1)->nullable();
            $table->boolean('ambulation')->default(false);
            $table->enum('fever_history', ['never', 'yes', 'no'])->default('never');
            $table->decimal('bmi', 4, 1)->nullable();
            $table->integer('fio2')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
