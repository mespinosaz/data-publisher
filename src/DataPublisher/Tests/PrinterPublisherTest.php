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
        $result = $this->obtainPublishOutput($content);
        $this->assertEquals($content, $result);
    }

    public function testPrintObject()
    {
        $content = new \stdClass();
        $content->foo = 'bar';
        $result = $this->obtainPublishOutput($content);
        $this->assertEquals(print_r($content, true), $result);
    }

    public function testPrintArray()
    {
        $content = array(
            'dance' => 'now'
        );
        $result = $this->obtainPublishOutput($content);
        $this->assertEquals(print_r($content, true), $result);
    }

    private function obtainPublishOutput($content)
    {
        ob_start();
        $this->publisher->publish($content);
        return ob_get_clean();
    }
}