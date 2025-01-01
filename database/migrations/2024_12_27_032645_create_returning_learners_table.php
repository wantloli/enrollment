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
        Schema::create('returning_learners', function (Blueprint $table) {
            $table->id();
            $table->string('grade_level')->nullable();
            $table->string('school_year')->nullable();
            $table->string('school')->nullable();
            $table->string('school_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returning_learners');
    }
};
