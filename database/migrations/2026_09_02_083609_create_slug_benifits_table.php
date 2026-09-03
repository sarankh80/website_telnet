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
        Schema::create('slug_benifits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("slug_id")->constrained("slugs")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("title")->default("title")->require();
            $table->string("title_km")->default("title_km")->require();
            $table->string("icon")->default("title_km")->require();
            $table->longText("desc")->nullable();
            $table->longText("desc_km")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slug_benifits');
    }
};
