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
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('link')->nullable();
            $table->string('degree');
            $table->string('subject');
            $table->string('major')->nullable();
            $table->string('syllabus')->nullable();
            $table->float('gpa')->nullable();
            $table->float('scale')->nullable();
            $table->string('session');
            $table->boolean('current')->default(false);
            $table->date('graduation_date')->nullable();
            $table->longText('accolades')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
