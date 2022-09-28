<?php
/**
 * @file
 * Importing RDF Feeds
 */

namespace Custom\Feeds;

use Custom\Feeds\Service\Consumer;

class Feed extends Consumer
{
    public $result;

    /**
     * 
     * @param string $url
     * @param string $date
     */
    function __construct($url, $date)
    {
        $this->result = $this->getFeed($url, $date);
    }

    function getResult()
    {
        return $this->result;
    }
}