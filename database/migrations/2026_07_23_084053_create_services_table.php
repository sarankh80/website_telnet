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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name_km');
            $table->string('name_en');
            $table->text('description_km')->nullable();
            $table->text('description_en')->nullable();
            $table->string('icon')->default('fa-solid fa-wifi');
            $table->string('badge_km')->nullable();
            $table->string('badge_en')->nullable();
            $table->string('color')->default('green');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
