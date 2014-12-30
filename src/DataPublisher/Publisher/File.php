<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher;

class File extends Publisher
{
    public function __construct(Publisher\Configuration\File $configuration)
    {
        parent::__construct($configuration);
    }

    public function publish($content)
    {
        file_put_contents($this->getPath(), $content);
    }

    private function getPath()
    {
        return $this->configuration->getPath();
    }
}