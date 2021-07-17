<?php

namespace Tests;

use Experiment\CurlCaller;
use Experiment\Caller;
use PHPUnit\Framework\TestCase;


/**
 * @covers CurlCaller
 */
class RequesterTest extends TestCase
{
    function testCanInstantiate()
    {
        $sut = new CurlCaller();
        self::assertInstanceOf(Caller::class, $sut);
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