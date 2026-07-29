<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->nullable()->constrained('careers')->nullOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 50)->nullable();
            $table->string('position', 200)->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('cv_path');
            $table->enum('status', ['new', 'reviewing', 'shortlisted', 'rejected', 'hired'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};
