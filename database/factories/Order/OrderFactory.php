<?php

declare(strict_types=1);

namespace Database\Factories\Order;

use App\Models\Order\Order;
use App\Models\Robot\Robot;
use Database\Factories\BaseFactory;
use Illuminate\Support\Collection;

/**
 * @method Order|Collection<Order> create(array $attributes = [])
 * @method Order|Collection<Order> make(array $attributes = [])
 */
class OrderFactory extends BaseFactory
{
    public static function loadAny(array $columns = null): Order
    {
        $columns ??= ['id'];

        return Order::firstOrFail($columns);
    }

    public function definition(): array
    {
        return [
            'payload' => '{}',
        ];
    }

    public function forRobot(Robot $robot): self
    {
        return $this->state(['robot_id' => $robot->id]);
    }
}
