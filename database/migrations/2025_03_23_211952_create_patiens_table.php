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
        Schema::create('patiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->enum('merital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('CNSS')->nullable();
            $table->string('Insurance')->nullable();
            $table->enum('patient_type', ['outpatient', 'inpatient', 'emergency']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patiens');
    }
};
