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
        Schema::table('course_case_counts', function (Blueprint $table) {
            $table->integer('pending_cases_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_case_counts', function (Blueprint $table) {
            $table->dropColumn('pending_cases_count');
        });
    }
};
