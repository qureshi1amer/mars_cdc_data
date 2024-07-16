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
        Schema::create('cdc_data', function (Blueprint $table) {
            $table->id();
            $table->string('row_id');
            $table->string('jurisdiction');
            $table->string('demographic');
            $table->string('overall');
            $table->string('recommendation');
            $table->string('date_range');
            $table->year('year');
            $table->string('frequency');
            $table->float('percentage');
            $table->string('confidence_interval');
            $table->integer('sample_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cdc_data');
    }
};
