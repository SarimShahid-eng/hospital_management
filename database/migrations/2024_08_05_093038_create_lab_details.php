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
        Schema::create('lab_details', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('appointment_id')->index();
            $table->integer('amount');
            $table->integer('lab_test_id')->index();
            $table->integer('discount')->default('0');
            $table->enum('status', ['completed', 'pending'])->default('pending');
            $table->string('result')->nullable();
            $table->timestamps();
            // $table->index('lab_test_id');
            // $table->index('appointment_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_details');
    }
};
