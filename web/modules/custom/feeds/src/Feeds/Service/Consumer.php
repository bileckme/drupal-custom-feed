<?php

namespace Custom\Feeds\Service;

use \DateTime;
use FeedIo\Adapter\Guzzle\Client;

class Consumer extends FeedService
{
    /**
     * $
     */
    public function getFeed($url, string $date)
    {
        $client = new Client(new \GuzzleHttp\Client());

        $logger = new \Psr\Log\NullLogger();

        $feedIo = new \FeedIo\FeedIo($client, $logger);

        // this date is used to fetch only the latest items
        $modifiedSince = new DateTime($date);

        // now fetch its (fresh) content
        return $feedIo->read($url)->getFeed();
    }
}