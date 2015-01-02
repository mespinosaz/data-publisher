<?php

namespace mespinosaz\DataPublisher\Publisher;

abstract class AbstractPublisher
{
    protected $configuration;

    public function __construct(Configuration\AbstractConfiguration $configuration)
    {
        $this->setupConfiguration($configuration);
    }

    protected function setupConfiguration(Configuration\AbstractConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    abstract public function publish($content);
}
