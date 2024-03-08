<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Base of all tests.
 */
abstract class BaseTest extends BaseTestCase
{
    use CreatesApplication;
    use TestHelpers;
}
