<?php

namespace Custom\Feeds\Service;

use \DateTime;
use FeedIo\Adapter\Guzzle\Client;

class Consumer extends FeedService
{
    /**
     * Gets the feed
     * 
     * @param $url
     * @param $date
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
    
    /**
     * Log Null Exception  
     *
     * @param \Psr\Log\NullLogger $logger
     * @param string $message
     * @return void
     */
    public function logException(\Psr\Log\NullLogger $logger, $message)
    {
        try {
            $level = LOG_WARNING;
            $logger->log($level, $message);
        } catch (\Exception $e){
            echo("[" . Carbon::now() . "] Log warning: " . $e->getMessage() . "\n");
        }
    }
}
