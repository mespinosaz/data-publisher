<?php

namespace mespinosaz\DataPublisher;

abstract class Publisher
{
    protected $configuration;

    public function __construct(Publisher\Configuration $configuration)
    {
        $this->setupConfiguration($configuration);
    }

    protected function setupConfiguration(Publisher\Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    abstract public function publish($content);
}
