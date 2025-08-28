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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('role')->nullable();
            $table->longText('technologies')->nullable();
            $table->enum('type', ['Personal', 'Professional'])->default('Personal');
            $table->unsignedBigInteger('experience_id')->nullable();
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('set null');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
