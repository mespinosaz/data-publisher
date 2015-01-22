<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher\Printer as Publisher;

class PrinterPublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    public function setUp()
    {
        $this->publisher = new Publisher();
    }

    public function testPrintString()
    {
        $content = 'foo';
        $result = $this->publisher->publish($content);
        $this->assertEquals($content, $result);
    }
}
