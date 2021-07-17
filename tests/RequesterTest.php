<?php

namespace Tests;

use Experiment\CurlRequester;
use Experiment\Requester;
use PHPUnit\Framework\TestCase;


/**
 * @covers CurlRequester
 */
class RequesterTest extends TestCase
{
    function testCanInstantiate()
    {
        $sut = new CurlRequester();
        self::assertInstanceOf(Requester::class, $sut);
    }

    /**
     * @group integration
     */
    function testCanGetResponseFromPage()
    {
        $sut = new CurlRequester();
        $response = $sut->call('www.google.com');
        self::assertNotEmpty($response); 
    }


    function testCanGetResponseHasProperties()
    {
        $sut = new CurlRequester();
        $response = $sut->call('www.google.com');
        self::assertEquals(200, $response->getStatusCode());
        self::assertNotEmpty($response->getContent());
    }
}