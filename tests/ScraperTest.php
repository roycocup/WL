<?php


namespace Tests;

use Experiment\ScraperInterface;
use Experiment\VidexScraperInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers ScraperInterface
 */
class ScraperTest extends TestCase
{

    function testItInstantiates()
    {
        $sut = new VidexScraperInterface();
        self::assertInstanceOf(ScraperInterface::class, $sut);
    }

}