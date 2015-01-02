<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher;

class FilesystemPublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    const TEST_FILE_PATH = '/tmp/filesystem_publisher_test.txt';

    public function setUp()
    {
        $configuration = new Publisher\Configuration\Filesystem(self::TEST_FILE_PATH);
        $this->publisher = new Publisher\Storage($configuration);
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