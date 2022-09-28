<?php
namespace Custom\Feeds\Tests;
use Carbon\Carbon;
use Custom\Feeds\Feed;
use PHPUnit\Framework\TestCase;

class CustomFeedTest extends TestCase
{
    function __construct() {
        parent::__construct();
    }

    protected function setUp(): void {
        parent::setUp();
    }

    public function testFeed()
    {
        $feed = new Feed('https://allafrica.com/tools/headlines/rdf/southafrica/headlines.rdf', Carbon::now());
        $this->assertInstanceOf("Custom\\Feeds\\Feed", $feed);
    }

    public function testFeedResult()
    {
        $feed = new Feed('https://allafrica.com/tools/headlines/rdf/southafrica/headlines.rdf', Carbon::now());
        $result = $feed->getResult();
        $this->assertInstanceOf("FeedIo\Feed", $result);
        $data = [];
        foreach($feed->getResult() as $item)
        {
            $data[] = [
                'title' => $item->getTitle(),
                'link' => $item->getLink(),
                'description' => $item->getContent(),
            ];
        }
        $this->assertIsArray($data);
        //var_dump($data);
    } 
    
    protected function tearDown(): void {
        parent::tearDown();
    }
}
