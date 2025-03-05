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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('mr_no');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('record_created')->nullable();
            $table->integer('user_id');
            $table->integer('branch_id');
            $table->integer('main_total')->comment('main_total_before_discount');
            $table->integer('total')->comment('total_after_discount');
            $table->integer('total_discount')->comment('discount')->nullable();
            $table->enum('status', ['active', 'pending', 'cancelled'])->default('pending');

            $table->index('user_id');
            $table->index('branch_id');
            $table->index('id');
            // $table->index('doctor_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
