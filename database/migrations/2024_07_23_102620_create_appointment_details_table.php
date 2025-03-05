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
        Schema::create('appointment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id');
            $table->integer('que_no')->nullable();
            $table->integer('amount');
            $table->integer('doctor_id');
            $table->integer('discount')->default('0');
            $table->string('referring_doctor')->nullable();
            $table->timestamps();

            $table->index('doctor_id');
            $table->index('appointment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_details');
    }
};
