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
}