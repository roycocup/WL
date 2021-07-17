<?php

namespace Tests;

use Experiment\CurlCaller;
use Experiment\Caller;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\TestCase;


/**
 * @covers CurlCaller
 */
class ResponseTest extends TestCase
{
    function testHasProperties()
    {

        $sut = new Response();
        $sut->setStatusCode(200);
        $sut->setContent("sdfsdf");

        self::assertEquals($sut->getStatusCode(), 200);
        self::assertEquals($sut->getContent(), "sdfsdf");
    }
}