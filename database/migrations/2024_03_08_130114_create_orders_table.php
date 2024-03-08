<?php

declare(strict_types=1);

use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('robot_id');
            $table->json('payload');
            $table->timestamps();

            $table->foreign('robot_id')
                ->references('id')
                ->on('robots');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
