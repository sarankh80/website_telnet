<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the partial column if it exists (leftover from a failed previous attempt)
        if (Schema::hasColumn('services', 'service_type')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('service_type');
            });
        }

        Schema::table('services', function (Blueprint $table) {
            $table->foreignId('service_type')->nullable()->constrained('service_types')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['service_type']);
            $table->dropColumn('service_type');
        });
    }
};
