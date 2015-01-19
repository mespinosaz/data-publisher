<?php

namespace mespinosaz\DataPublisher\Tests;

use mespinosaz\DataPublisher\Publisher\Configuration\Rest as Configuration;
use mespinosaz\DataPublisher\Publisher\Rest as Publisher;

class RestPublisherTest extends \PHPUnit_Framework_TestCase
{
    private $publisher;

    public function setUp()
    {
        $this->setupPublisher();
    }

    private function setupPublisher($method = 'POST')
    {
        $url = 'http://example.com/test/rest.php';
        $configuration = new Configuration($url);
        $this->publisher = new Publisher($configuration);
        $client = $this->setupClientMock($url, $method);
        $this->publisher->setClient($client);
    }

    private function setupClientMock($url, $method)
    {
        $response = $this->getMock(
            'GuzzleHttp\Message\Request',
            array('getStatusCode'),
            array($method,$url)
        );

        $response->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(200));

        $client = $this->getMock(
            'GuzzleHttp\Client',
            array('send')
        );

        $client->expects($this->any())
            ->method('send')
            ->will($this->returnValue($response));

        return $client;
    }

    public function testPost()
    {
        $this->assertEquals(200, $this->publisher->publish('{"dance":"ok"}'));
    }
}
