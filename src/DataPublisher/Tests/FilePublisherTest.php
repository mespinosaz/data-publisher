<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as Configuration;
use mespinosaz\DataPublisher\Publisher\Filesystem as Publisher;
use League\Flysystem\Adapter\Local as Adapter;

class FilesystemPublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    const TEST_FILE_PATH = '/tmp/filesystem_publisher_test.txt';

    public function setUp()
    {
        $adapter = new Adapter('/');
        $configuration = new Configuration($adapter);
        $this->publisher = new Publisher($configuration);
    }

    public function testFile()
    {
        $content = '<foo>bar</foo>';
        $this->publisher->publish($content, self::TEST_FILE_PATH);
        $result = file_get_contents(self::TEST_FILE_PATH);
        $this->assertEquals($content, $result);
        unlink(self::TEST_FILE_PATH);
    }
}
