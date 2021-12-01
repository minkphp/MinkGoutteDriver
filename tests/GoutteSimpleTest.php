<?php

namespace Behat\Mink\Driver\Tests;

use Behat\Mink\Driver\GoutteDriver;
use PHPUnit\Framework\TestCase;
use Behat\Mink\Session;
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleHttpClient;

class GoutteSimpleTest extends TestCase
{
    public function test_simple_instance()
    {
        $driver = new GoutteDriver();
        $this->assertInstanceOf("Behat\Mink\Driver\GoutteDriver", $driver);
    }

    public function test_simple_get_client()
    {
        $driver = new GoutteDriver();
        $this->assertInstanceOf("Behat\Mink\Driver\Goutte\Client", $driver->getClient());
    }

    public function test_guzzle_instance()
    {
        $client = new GuzzleHttpClient();
        $goutte = new GoutteClient();
        $goutte->setClient($client);
        $driver = new GoutteDriver($goutte);
        $this->assertInstanceOf("Behat\Mink\Driver\GoutteDriver", $driver);
    }

    public function test_guzzle_get_client()
    {
        $client = new GuzzleHttpClient();
        $goutte = new GoutteClient();
        $goutte->setClient($client);
        $driver = new GoutteDriver($goutte);
        $this->assertInstanceOf("Goutte\Client", $driver->getClient());
    }

    public function test_localhost_visit_status_code()
    {
        $driver = new GoutteDriver();
        $session = new Session($driver);
        $session->visit("localhost");
        $status_code = $session->getStatusCode();
        $this->assertIsInt($status_code);
    }

    public function test_localhost_guzzle_visit_status_code()
    {
        $client = new GuzzleHttpClient();
        $goutte = new GoutteClient();
        $goutte->setClient($client);
        $driver = new GoutteDriver($goutte);
        $session = new Session($driver);
        $session->visit("localhost");
        $status_code = $session->getStatusCode();
        $this->assertIsInt($status_code);
    }

    public function test_localhost_visit_html()
    {
        $driver = new GoutteDriver();
        $session = new Session($driver);
        $session->visit("localhost");
        $page = $session->getPage();
        $html = $page->getHtml();
        $this->assertIsString($html);
    }

    public function test_localhost_guzzle_visit_html()
    {
        $client = new GuzzleHttpClient();
        $goutte = new GoutteClient();
        $goutte->setClient($client);
        $driver = new GoutteDriver($goutte);
        $session = new Session($driver);
        $session->visit("localhost");
        $page = $session->getPage();
        $html = $page->getHtml();
        $this->assertIsString($html);
    }
}
