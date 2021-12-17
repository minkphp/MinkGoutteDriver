<?php

namespace Behat\Mink\Tests\Driver\Custom;

use Behat\Mink\Driver\GoutteDriver;
use Goutte\Client;
use PHPUnit\Framework\TestCase;

class InstantiationTest extends TestCase
{
    public function testInstantiateWithClient()
    {
        $client = $this->getMockBuilder('Goutte\Client')->disableOriginalConstructor()->getMock();
        $client->expects($this->once())
            ->method('followRedirects')
            ->with(true);

        $driver = new GoutteDriver($client);

        $this->assertSame($client, $driver->getClient());
    }

    public function testInstantiateWithoutClient()
    {
        $driver = new GoutteDriver();

        $this->assertInstanceOf(Client::class, $driver->getClient());
    }
}
