<?php

declare(strict_types=1);

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;

/**
 * Base of all database migrations.
 */
abstract class BaseMigration extends Migration
{
    /** Reverse the migration. */
    abstract public function down(): void;

    /** Run the migration. */
    abstract public function up(): void;
}
