<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Illuminate\Support\Facades\Config;
use Tests\BaseTest;

class ShowInfoBaseTest extends BaseTest
{
    function test_it_returns_application_name()
    {
        $response = $this->get('');

        $response->assertOk()
            ->assertJsonPath('name', Config::get('app.name'));
    }
}
