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
        Schema::create('labortaries', function (Blueprint $table) {
            $table->id();
            $table->string('labortary_test');
            $table->string('name')->nullable();
            $table->string('unit');
            $table->string('range');
            $table->string('abbreviation');
            $table->string('fees');
            // $table->enum('status',['completed','pending'])->default('pending');
            // $table->string('result')->nullable();
            // $table->string('name')->nullable();
            $table->integer('branch_id');
            $table->timestamps();

            $table->index('id');
            $table->index('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labortaries');
    }
};
