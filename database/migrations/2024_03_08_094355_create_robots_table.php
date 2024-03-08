<?php

declare(strict_types=1);

use App\Models\Robot\Type;
use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    public function up(): void
    {
        $types = Type::cases();

        $types = Collection::make($types)
            ->map(fn(Type $type) => $type->value)
            ->toArray();

        Schema::create('robots', function (Blueprint $table) use ($types) {
            $table->id();
            $table->enum('type', $types);
            $table->string('name');
            $table->timestamps();

            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('robots');
    }
};
