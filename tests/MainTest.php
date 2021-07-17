<?php

namespace Tests;

use Experiment\Caller;
use Experiment\CallerInterface;
use Experiment\Main;
use Experiment\Response;
use Experiment\ScraperInterface;
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
        $this->mockCaller = self::createMock(CallerInterface::class);
        $this->mockScraper = self::createMock(ScraperInterface::class);
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
        $this->mockCaller->method('call');
        $result = $this->sut->run($this->mockCaller, $this->mockScraper);

        self::assertNotEmpty($result);
        self::isJson($result);
    }

    function testResponseContainsProperties()
    {
        $mockResponse = self::getMockBuilder(Response::class)->getMock();
        $mockResponse->method('getTitle')->willReturn('title');
        $mockResponse->method('getDescription')->willReturn('description');
        $mockResponse->method('getPrice')->willReturn(156);
        $mockResponse->method('getDiscount')->willReturn(9);

        $mockScraper = self::getMockBuilder(ScraperInterface::class)->getMock();
        $mockScraper->method('scrape')->willReturn($mockResponse);

        $result = $this->sut->run($this->mockCaller, $mockScraper);

        $result = (array) json_decode($result);

        $singleSet = (array)$result[0];

        self::assertEquals('title', $singleSet['title']);
        self::assertEquals('description', $singleSet['description']);
        self::assertEquals(156, $singleSet['price']);
        self::assertEquals(9, $singleSet['discount']);


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