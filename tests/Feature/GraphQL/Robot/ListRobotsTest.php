<?php

declare(strict_types=1);

namespace Feature\GraphQL\Robot;

use Tests\Feature\GraphQL\GraphQLTest;

class ListRobotsTest extends GraphQLTest
{
    function test_list_robots_id_only()
    {
        #$this->logDatabaseQueries();

        $response = $this->graphQL(/** @lang GraphQL */ '
          query ListRobots {
            robots {
              data {
                id
              }
              # Just because we can, also show all the paginator info.
              paginatorInfo {
                count
                currentPage
                firstItem
                hasMorePages
                lastItem
                lastPage
                perPage
                total
              }
            }
          }
        ');

        #$response->dump();

        $response->assertOk()
            ->assertJsonIsArray('data.robots.data');
    }
}
