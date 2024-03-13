<?php

declare(strict_types=1);

namespace Feature\GraphQL\Status;

use Tests\Feature\GraphQL\GraphQLTest;

class ShowStatusTest extends GraphQLTest
{
    function test_show_status()
    {
        $response = $this->graphQL(/** @lang GraphQL */ '
          query ShowStatus {
            status {
              api
              cache
              database
            }
          }
        ');

        $response->assertOk();

        $status = (object) $response->json('data.status');

        $this->assertTrue($status->api);
        $this->assertTrue($status->cache);
        $this->assertTrue($status->database);
    }
}
