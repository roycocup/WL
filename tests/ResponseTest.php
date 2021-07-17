<?php


namespace Tests;


use Experiment\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Experiment\Response
 */
class ResponseTest extends TestCase
{

    function testCanGetProperties()
    {
        $sut = new Response();
        $sut->setTitle('title');
        $sut->setDescription('this is a description');
        $sut->setPrice(100);
        $sut->setDiscount(10);

        self::assertEquals('title', $sut->getTitle());
        self::assertEquals('this is a description', $sut->getDescription());
        self::assertEquals(100, $sut->getPrice());
        self::assertEquals(10, $sut->getDiscount());
    }
}