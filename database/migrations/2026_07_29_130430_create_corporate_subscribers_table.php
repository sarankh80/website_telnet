<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporate_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_name_km');
            $table->string('logo')->nullable();
            $table->string('industry', 150)->nullable();
            $table->string('industry_km', 150)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('contact_person', 150)->nullable();
            $table->string('contact_email', 150)->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->text('description')->nullable();
            $table->text('description_km')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporate_subscribers');
    }
};
