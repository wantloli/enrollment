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
        Schema::create('special_needs', function (Blueprint $table) {
            $table->id();
            $table->text('with_diagnosis')->nullable();
            $table->text('with_manifestations')->nullable();
            $table->boolean('is_have_pwd_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_needs');
    }
};
