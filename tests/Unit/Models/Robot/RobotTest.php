<?php

declare(strict_types=1);

namespace Tests\Unit\Models\Robot;

use App\Models\Robot\Robot;
use App\Models\Robot\Type;
use Database\Factories\Order\OrderFactory;
use Database\Factories\Robot\RobotFactory;
use Tests\BaseTest;

class RobotTest extends BaseTest
{
    function test_some_robot_exists()
    {
        $robotExists = Robot::query()
            ->exists();

        $this->assertTrue($robotExists);
    }

    /*
     * Relations:
     */

    function test_orders_relation_loading()
    {
        $someOrder = OrderFactory::loadAny(['robot_id']);
        $robot = RobotFactory::empty($someOrder->robot_id);

        $robotHasOrders = $robot->orders()
            ->exists();

        $this->assertTrue($robotHasOrders);
    }

    /*
     * Accessors & Mutators:
     */

    function test_type_enum()
    {
        $robot = new Robot();
        $this->assertNull($robot->type);

        $robot->setAttribute('type', Type::ONE->value);
        $this->assertEquals(Type::ONE, $robot->type);

        $robot->type = Type::OCF;
        $rawAttributes = $robot->getAttributes();
        $this->assertEquals(Type::OCF->value, $rawAttributes['type']);
    }
}
