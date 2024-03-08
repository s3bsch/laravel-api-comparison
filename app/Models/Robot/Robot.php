<?php

declare(strict_types=1);

namespace App\Models\Robot;

use App\Models\BaseModel;
use App\Models\Order\Order;
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
}
