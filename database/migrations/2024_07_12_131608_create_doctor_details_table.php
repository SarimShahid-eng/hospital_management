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
        Schema::create('doctor_details', function (Blueprint $table) {
            $table->id()->index();
            $table->time('timing_from');
            $table->time('timing_to');
            $table->string('specialization');
            $table->integer('consultancy_fee');
            $table->integer('procedure_percentage');
            $table->integer('doctor_sharing');
            $table->string('contact1',15);
            $table->string('contact2',15);
            $table->integer('doctor_id');
            $table->string('degree');
            $table->string('designation');
            $table->timestamps();
            $table->index('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_details');
    }
};
