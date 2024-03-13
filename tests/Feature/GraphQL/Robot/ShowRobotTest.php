<?php

declare(strict_types=1);

namespace Feature\GraphQL\Robot;

use Database\Factories\Robot\RobotFactory;
use Tests\Feature\GraphQL\GraphQLTest;

class ShowRobotTest extends GraphQLTest
{
    function test_show_robot()
    {
        $robot = RobotFactory::loadAny();

        #$this->logDatabaseQueries(true);  // Only for demonstration purposes.

        $response = $this->graphQL(/** @lang GraphQL */ '
          query ShowRobot($robotId: ID!) {
            robot(id: $robotId) {
              id
              name
            }
          }
        ', ['robotId' => $robot->id]);

        $response->dump();  // Only for demonstration purposes.

        $response->assertOk()
            ->assertJsonPath('data.robot.id', (string) $robot->id);
    }
}
