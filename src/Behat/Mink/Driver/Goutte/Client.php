<?php

/*
 * This file is part of the Behat\Mink.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Mink\Driver\Goutte;

use Goutte\Client as BaseClient;
use Guzzle\Http\Message\Response as GuzzleResponse;

/**
 * Client overrides to support Mink functionality.
 */
class Client extends BaseClient
{
    /**
     * Reads response meta tags to guess content-type charset.
     */
    protected function createResponse(GuzzleResponse $response)
    {
        $body        = $response->getBody(true);
        $contentType = $response->getContentType();

        if (!$contentType || false === strpos($contentType, 'charset=')) {
            if (preg_match('/\<meta[^\>]+charset *= *["\']?([a-zA-Z\-0-9]+)/i', $body, $matches)) {
                $contentType .= ';charset='.$matches[1];
            }
        }
        $response->setHeader('Content-Type', $contentType);

        return parent::createResponse($response);
    }
}
