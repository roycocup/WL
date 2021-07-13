<?php

namespace Tests;

use Experiment\Main;
use PHPUnit\Framework\TestCase;

/**
 * @covers Experiment\Main
 */
class MainTest extends TestCase
{
    
    function testThisWorks()
    {
        $sut = new Main();
        self::assertNotEmpty($sut);
    }
}