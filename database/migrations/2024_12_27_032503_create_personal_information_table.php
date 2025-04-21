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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('birth_certificate_no')->nullable();
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('first_name');
            $table->string('extension_name')->nullable();
            $table->string('age');
            $table->string('sex');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('mother_tongue');
            $table->string('four_ps_household_number')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
