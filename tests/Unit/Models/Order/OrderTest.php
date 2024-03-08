<?php

declare(strict_types=1);

namespace Tests\Unit\Models\Order;

use App\Models\Order\Order;
use Database\Factories\Order\OrderFactory;
use Tests\BaseTest;

class OrderTest extends BaseTest
{
    function test_some_order_exists()
    {
        $orderExists = Order::query()
            ->exists();

        $this->assertTrue($orderExists);
    }

    /*
     * Relations:
     */

    function test_robot_relation_association()
    {
        $order = new Order();

        $order->robot()
            ->associate(1);

        $this->assertEquals(1, $order->robot_id);
    }

    function test_robot_relation_loading()
    {
        $order = OrderFactory::loadAny(['robot_id']);
        $order->load('robot:id');

        $this->assertEquals($order->robot_id, $order->robot->id);
    }
}
