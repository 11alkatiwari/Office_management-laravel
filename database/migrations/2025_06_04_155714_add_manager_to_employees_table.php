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
        Schema::table('employees', function (Blueprint $table) {
            // Only add column if it doesn't already exist
            if (!Schema::hasColumn('employees', 'manager_id')) {
                $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
    $table->unsignedBigInteger('manager_id')->nullable()->after('company_id');
    $table->foreign('manager_id')->references('id')->on('employees')->onDelete('set null');

        });
    }
};
