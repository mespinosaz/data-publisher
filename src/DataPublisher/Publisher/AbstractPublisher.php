<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher\Configuration\AbstractConfiguration;

abstract class AbstractPublisher
{
    /**
     * @var AbstractConfiguration $configuration
     */
    protected $configuration;

    /**
     * @param AbstractConfiguration $configuration
     */
    public function __construct(AbstractConfiguration $configuration)
    {
        $this->setupConfiguration($configuration);
    }

    /**
     * @param AbstractConfiguration $configuration
     */
    protected function setupConfiguration(AbstractConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param string $content
     */
    abstract public function publish($content);
}
