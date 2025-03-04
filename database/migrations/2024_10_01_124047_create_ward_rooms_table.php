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
        Schema::create('ward_rooms', function (Blueprint $table) {
            $table->id();
            // category name description charges
            $table->string('category');
            $table->string('name');
            $table->string('description');
            $table->Biginteger('charges');
            $table->integer('branch_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ward_rooms');
    }
};
