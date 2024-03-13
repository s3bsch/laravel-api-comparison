<?php

declare(strict_types=1);

namespace App\Models\Robot;

use App\Models\BaseModel;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Simple robot model.
 *
 * @property-read int $id
 * @property string $name
 * @property-read Collection<Order> $orders
 * @property Type $type
 */
class Robot extends BaseModel
{
    protected $casts = [
        'type' => Type::class,
    ];

    /*
     * Relations:
     */

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /*
     * Scopes:
     */

    // TODO Provide a global scope if needed more often.
    public function scopeId(EloquentBuilder $query, int $id): void
    {
        $query->where('id', $id);
    }
}
