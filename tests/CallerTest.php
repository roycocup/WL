<?php

namespace Tests;

use Experiment\CallerInterface;
use Experiment\CurlCaller;
use Experiment\Caller;
use PHPUnit\Framework\TestCase;


/**
 * @covers CurlCaller
 */
class CallerTest extends TestCase
{
    function testCanInstantiate()
    {
        $sut = new CurlCaller();
        self::assertInstanceOf(CallerInterface::class, $sut);
    }

    /**
     * @group integration
     */
    function testCanGetResponseFromPage()
    {
        $sut = new CurlCaller();
        $response = $sut->call('www.google.com');
        self::assertNotEmpty($response); 
    }


    function testCanGetResponseHasProperties()
    {
        $sut = new CurlCaller();
        $response = $sut->call('www.google.com');
        self::assertEquals(200, $response->getStatusCode());
        self::assertNotEmpty($response->getContent());
    }
}