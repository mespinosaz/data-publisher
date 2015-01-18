<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as Configuration;
use mespinosaz\DataPublisher\Publisher\Filesystem as Publisher;

class FtpPublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    const TEST_FILE_PATH = './filesystem_publisher_test.txt';
    const TEST_FILE_CONTENT = '<foo>bar</foo>';

    public function setUp()
    {
        $adapter = $this->setupFtpMock();
        $configuration = new Configuration($adapter, self::TEST_FILE_PATH);
        $this->publisher = new Publisher($configuration);
    }

    private function setupFtpMock()
    {
        $params = array(
            'host' => 'ftp.example.com',
            'username' => 'username',
            'password' => 'password'
        );

        $adapter = $this->getMock(
            'League\Flysystem\Adapter\Ftp',
            array('connect', 'getMetadata', 'write'),
            array($params)
        );

        $adapter->expects($this->any())
            ->method('getMetadata')
            ->will($this->returnValue(false));

        $adapter->expects($this->once())
            ->method('write')
            ->will($this->returnValue(array('foo.test','bar','plain/txt','')));

        return $adapter;
    }

    public function testFtp()
    {

        $content = '<foo>bar</foo>';
        $result = $this->publisher->publish($content);
        $this->assertTrue($result);
    }
}
