<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Make `nombre` nullable so inserts to `name` succeed when `nombre` not provided
        DB::statement('ALTER TABLE `products` MODIFY `nombre` VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `products` MODIFY `nombre` VARCHAR(255) NOT NULL');
    }
};
