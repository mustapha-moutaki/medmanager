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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
        
            // User who owns the document
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
            // File details
            $table->string('file_path');
            $table->string('file_name');
            $table->enum('file_type', ['pdf', 'docx', 'png', 'jpg', 'txt'])->default('pdf');
            $table->bigInteger('file_size');
        
            $table->text('description')->nullable();
        
            // User who uploaded the document
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
        
            $table->timestamps();
        
            // Optional Indexes
            $table->index(['user_id', 'uploaded_by']);
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};