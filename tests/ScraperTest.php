<?php


namespace Tests;

use Experiment\Scraper;
use Experiment\VidexScraper;
use PHPUnit\Framework\TestCase;

/**
 * @covers Scraper
 */
class ScraperTest extends TestCase
{

    public function testItInstantiates()
    {
        $sut = new VidexScraper();
        self::assertInstanceOf(Scraper::class, $sut);
    }

}