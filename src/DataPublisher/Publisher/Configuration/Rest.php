<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

class Rest extends AbstractConfiguration
{
    /**
     * @var string $url
     */
    protected $url;

    /**
     * @var string $method
     */
    protected $method;

    /**
     * @param string $url
     * @param string $method
     */
    public function __construct($url, $method = 'POST')
    {
        $this->method = $method;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

}
