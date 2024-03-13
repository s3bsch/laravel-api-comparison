<?php

declare(strict_types=1);

namespace Tests\Feature\GraphQL;

use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Tests\BaseTest;

abstract class GraphQLTest extends BaseTest
{
    use MakesGraphQLRequests;

    function setUp(): void
    {
        parent::setUp();

        // NOTE In case there is ever a GraphQL feature test which explicitly does not need this, add a flag.
        $this->rethrowGraphQLErrors();
    }
}
