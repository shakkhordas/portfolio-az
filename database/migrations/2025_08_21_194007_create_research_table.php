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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('abstract')->nullable();
            $table->text('keywords')->nullable();
            $table->string('role')->nullable();
            $table->enum('status', ['Ongoing', 'Completed', 'Accepted', 'Published'])->default('Ongoing');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
