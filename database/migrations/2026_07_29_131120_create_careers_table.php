<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_km');
            $table->string('department', 150)->nullable();
            $table->string('department_km', 150)->nullable();
            $table->string('location', 150)->nullable();
            $table->string('location_km', 150)->nullable();
            $table->enum('type', ['full-time', 'part-time', 'contract', 'internship'])->default('full-time');
            $table->text('description')->nullable();
            $table->text('description_km')->nullable();
            $table->text('requirements')->nullable();
            $table->text('requirements_km')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
