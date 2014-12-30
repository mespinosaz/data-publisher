<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher;

class FilePublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    const TEST_FILE_PATH = '/tmp/file_publisher_test.txt';

    public function setUp()
    {
        $configuration = new Publisher\Configuration\File(self::TEST_FILE_PATH);
        $this->publisher = new Publisher\File($configuration);
    }

    public function testFile()
    {
        $content = '<foo>bar</foo>';
        $this->publisher->publish($content);
        $result = file_get_contents(self::TEST_FILE_PATH);
        $this->assertEquals($content, $result);
        unlink(self::TEST_FILE_PATH);
    }

}