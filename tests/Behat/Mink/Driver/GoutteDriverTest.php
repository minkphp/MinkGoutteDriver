<?php

namespace Tests\Behat\Mink\Driver;

use Behat\Mink\Driver\GoutteDriver;

/**
 * @group functional
 */
class GoutteDriverTest extends GeneralDriverTest
{
    protected static function getDriver()
    {
        return new GoutteDriver();
    }
}
