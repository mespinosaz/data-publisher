<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher\Configuration\AbstractConfiguration;

abstract class AbstractPublisher
{
    protected $configuration;

    public function __construct(AbstractConfiguration $configuration)
    {
        $this->setupConfiguration($configuration);
    }

    protected function setupConfiguration(AbstractConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    abstract public function publish($content);
}
