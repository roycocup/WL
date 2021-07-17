<?php

namespace Tests;

use Experiment\CurlRequester;
use Experiment\Requester;
use Experiment\Response;
use PHPUnit\Framework\TestCase;


/**
 * @covers CurlRequester
 */
class ResponseTest extends TestCase
{
    function testCanInstantiate()
    {
        $sut = new Response();
        self::assertInstanceOf(Response::class, $sut);
    }

    function testHasProperties()
    {
        $sut = new Response();
        $sut->setStatusCode(200);
        $sut->setBody("sdfsdf");

        self::assertEquals($sut->statusCode(), 200);
        self::assertEquals($sut->body(), "sdfsdf");
    }
}