<?php

namespace mespinosaz\DataPublisher\Tests;

use League\Flysystem\Adapter\Local;
use League\Flysystem\FileExistsException;
use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as Configuration;
use mespinosaz\DataPublisher\Publisher\Filesystem as Publisher;

class FilesystemPublisherTest extends \PHPUnit_Framework_TestCase
{
    const TEST_FILE_PATH = '/path/to/file';

    public function testWriteFile()
    {
        $publisher = $this->getWritePublisherMock();

        $content = '<foo>bar</foo>';
        $result = $publisher->publish($content, self::TEST_FILE_PATH);

        $this->assertTrue($result);
    }

    public function testUpdateFile()
    {
        $publisher = $this->getUpdatePublisherMock();

        $content = '<foo>bar</foo>';
        $result = $publisher->publish($content, self::TEST_FILE_PATH);

        $this->assertTrue($result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidArgumentException()
    {
        $publisher = $this->getInvalidExceptionPublisherMock();

        $content = '<foo>bar</foo>';
        $publisher->publish($content);
    }

    public function getWritePublisherMock()
    {
        $adapter = new Local('/');

        $storage = $this->getStoreMock($adapter);

        $storage->expects($this->once())
            ->method('write')
            ->will($this->returnValue(true));

        $configuration = new Configuration($storage);

        $publisher = new Publisher($configuration);
        return $publisher;
    }

    public function getInvalidExceptionPublisherMock()
    {
        $adapter = new Local('/');

        $storage = $this->getStoreMock($adapter);

        $configuration = new Configuration($storage);

        $publisher = new Publisher($configuration);
        return $publisher;
    }

    public function getUpdatePublisherMock()
    {
        $adapter = new Local('/');

        $storage = $this->getStoreMock($adapter);

        $storage->expects($this->once())
            ->method('write')
            ->willThrowException(new FileExistsException('Whatever'));

        $storage->expects($this->once())
            ->method('update')
            ->will($this->returnValue(true));

        $configuration = new Configuration($storage);

        $publisher = new Publisher($configuration);
        return $publisher;
    }

    public function getStoreMock($adapter)
    {
        $storage = $this->getMockBuilder('\League\Flysystem\Filesystem')
            ->setConstructorArgs(array($adapter))
            ->setMethods(array('write', 'update'))
            ->getMock();
        return $storage;
    }
}
