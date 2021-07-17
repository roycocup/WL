<?php

namespace Tests;

use Experiment\Main;
use PHPUnit\Framework\TestCase;

/**
 * @covers Main
 */
class MainTest extends TestCase
{
    
    function testInstantiates()
    {
        $sut = new Main();
        self::assertInstanceOf(Main::class, $sut);
    }

    /**
     * @group integration
     * @group slow
     */
    function testCanGetJsonString()
    {
        $sut = new Main();
        $result = $sut->run();

        self::assertNotEmpty($result);
        self::isJson($result);
    }

    function testResponseContainsProperties()
    {
        $sut = new Main();
        $result = $sut->run();

        $expected = [ 'title', 'description', 'price', 'discount' ];
        $actual = json_decode($result);

        self::assertEquals($expected, $actual);
    }
}