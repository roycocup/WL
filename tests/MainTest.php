<?php

namespace Tests;

use Experiment\Caller;
use Experiment\Main;
use Experiment\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @covers Main
 */
class MainTest extends TestCase
{


    private $sut;
    private $mockCaller;
    private $mockScraper;

    public function setUp(): void
    {
        $this->mockCaller = self::createMock(Caller::class);
        $this->mockScraper = self::createMock(Scraper::class);
        $this->sut = new Main();
    }

    function testInstantiates()
    {
        self::assertInstanceOf(Main::class, $this->sut);
    }

    /**
     * @group integration
     * @group slow
     */
    function testCanGetJsonString()
    {
        $result = $this->sut->run($this->mockCaller);

        self::assertNotEmpty($result);
        self::isJson($result);
    }

    function testResponseContainsProperties()
    {
        $result = $this->sut->run($this->mockCaller);

        $expected = [ 'title', 'description', 'price', 'discount' ];
        $actual = json_decode($result);

        self::assertEquals($expected, $actual);
    }

    /**
     * @group integration
     * @group slow
     */
    function testCanGetFromRealWebsite()
    {
        $result = $this->sut->run($this->mockCaller, $this->mockScraper);

        self::assertNotEmpty($result);
        self::assertNotEmpty($result->getResults());
        $results = $result->getResults();
        self::assertNotEmpty($results->getTitle());
        self::assertNotEmpty($results->getDescription());
        self::assertNotEmpty($results->getPrice());
        self::assertNotEmpty($results->getDiscount());
    }
}