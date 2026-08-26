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
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("services_id")->constrained("services")->onDelete("restrict")->onUpdate("cascade");
            $table->string("name_en")->require();
            $table->string("name_kh")->require();
            $table->longText("description_en")->require();
            $table->longText("description_kh")->require();
            $table->double("price")->default(1)->require();
            $table->integer("term")->default(1)->require();
            $table->string("image")->default(1)->require();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs');
    }
};
