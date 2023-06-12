<?php

namespace Behat\Mink\Tests\Driver;

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Tests\Driver\Basic\IFrameTest;
use Behat\Mink\Tests\Driver\Basic\ScreenshotTest;

class GoutteConfig extends AbstractConfig
{
    public static function getInstance()
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    public function createDriver()
    {
        return new GoutteDriver();
    }

    public function skipMessage($testCase, $test): ?string
    {
        if ($testCase === IFrameTest::class) {
            return 'iFrames management is not supported.';
        }

        if ($testCase === ScreenshotTest::class) {
            return 'Screenshots are not supported.';
        }

        return parent::skipMessage($testCase, $test);
    }

    protected function supportsJs()
    {
        return false;
    }
}
