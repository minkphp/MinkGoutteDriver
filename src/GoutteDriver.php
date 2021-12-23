<?php

/*
 * This file is part of the Behat\Mink.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Mink\Driver;

use Goutte\Client;

/**
 * Goutte driver.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class GoutteDriver extends BrowserKitDriver
{
    /**
     * Initializes Goutte driver.
     *
     * @param Client $client Goutte client instance
     */
    public function __construct(Client $client = null)
    {
        parent::__construct($client ?? new Client());
    }
}
