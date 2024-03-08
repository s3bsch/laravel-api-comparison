<?php

declare(strict_types=1);

namespace Tests\Unit\Models\Robot;

use App\Models\Robot\Robot;
use Tests\BaseTest;

class RobotTest extends BaseTest
{
    function test_some_robot_exists()
    {
        $robotExists = Robot::query()
            ->exists();

        $this->assertTrue($robotExists);
    }
}
