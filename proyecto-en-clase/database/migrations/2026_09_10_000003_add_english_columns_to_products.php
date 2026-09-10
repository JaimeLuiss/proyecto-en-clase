<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add English-named columns as nullable to avoid breaking inserts
        DB::statement('ALTER TABLE `products` ADD COLUMN `name` VARCHAR(255) NULL AFTER `nombre`');
        DB::statement('ALTER TABLE `products` ADD COLUMN `description` TEXT NULL AFTER `name`');
        DB::statement('ALTER TABLE `products` ADD COLUMN `price` DECIMAL(10,2) NULL AFTER `description`');

        // Copy existing spanish columns into the new columns
        DB::statement('UPDATE `products` SET `name` = `nombre`, `description` = `descripcion`, `price` = `precio`');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `products` DROP COLUMN IF EXISTS `price`');
        DB::statement('ALTER TABLE `products` DROP COLUMN IF EXISTS `description`');
        DB::statement('ALTER TABLE `products` DROP COLUMN IF EXISTS `name`');
    }
};
