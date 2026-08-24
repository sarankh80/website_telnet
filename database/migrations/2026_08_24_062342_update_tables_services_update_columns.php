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
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign("services_slug_id_foreign");
            $table->dropColumn("slug_id");
            $table->dropColumn("badge_km");
            $table->dropColumn("badge_en");
            $table->dropColumn("icon");
            $table->dropColumn("color");
            $table->double("price")->default(0)->after("description_en");
            $table->integer("terms")->default(0)->after("price");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
};
