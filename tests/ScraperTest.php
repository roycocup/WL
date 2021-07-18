<?php


namespace Tests;

use Experiment\ScraperInterface;
use Experiment\VidexScraperInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * @covers ScraperInterface
 */
class ScraperTest extends TestCase
{

    private $sut;

    protected function setUp(): void
    {
        $this->sut = new VidexScraperInterface();
    }

    function testItInstantiates()
    {

        self::assertInstanceOf(ScraperInterface::class, $this->sut);
    }

    /**
     * @group integration
     * @group slow
     */
    function testItCanGetProperties()
    {
        $httpResponse = new Response();
        $httpResponse->setContent(file_get_contents(__DIR__.'/fixtures/videx.html'));
        $responses = $this->sut->scrape($httpResponse);

        self::assertEquals("Option 300 Mins", $responses[0]->getTitle());
        self::assertEquals(
            "300 minutes talk time per monthincluding 40 SMS(5p / minute and 4p / SMS thereafter)",
            $responses[0]->getDescription()
        );
        self::assertEquals(16, $responses[0]->getPrice());
        self::assertNull($responses[0]->getDiscount());

    }

}