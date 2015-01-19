<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher\Configuration\Rest as RestConfiguration;
use GuzzleHttp\Client;

class Rest extends AbstractPublisher
{
    /**
     * @var GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @param RestConfiguration $configuration
     */
    public function __construct(RestConfiguration $configuration)
    {
        parent::__construct($configuration);
        $this->setClient(new Client());
    }

    /**
     * @param GuzzleHttp\Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $content
     * @return int
     */
    public function publish($content)
    {
        $request = $this->buildRequest($content);
        $response = $this->client->send($request);
        return $response->getStatusCode();
    }

    /**
     * @param string $content
     * @return GuzzleHttp\Message\Request
     */
    private function buildRequest($content)
    {
        $url = $this->configuration->getUrl();
        $method = $this->configuration->getMethod();
        $request = $this->client->createRequest($method, $url);
        $body = $request->getBody();
        $body->setField('message', $content);
        return $request;
    }
}
