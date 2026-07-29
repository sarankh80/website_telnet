<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->foreignId('slug_id')->nullable()->after('service_type')
                  ->constrained('slugs')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['slug_id']);
            $table->dropColumn('slug_id');
        });
    }
};
