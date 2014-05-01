<?php

namespace Tests\Behat\Mink\Driver;

use Behat\Mink\Driver\GoutteDriver;

/**
 * @group unit
 */
class ExtraDriverTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiateWithClient()
    {
        $client = $this->getMockBuilder('Behat\Mink\Driver\Goutte\Client')->disableOriginalConstructor()->getMock();
        $client->expects($this->once())
            ->method('followRedirects')
            ->with(true);

        $driver = new GoutteDriver($client);

        $this->assertSame($client, $driver->getClient());
    }

    public function testInstantiateWithoutClient()
    {
        $driver = new GoutteDriver();

        $this->assertInstanceOf('Behat\Mink\Driver\Goutte\Client', $driver->getClient());
    }
}
