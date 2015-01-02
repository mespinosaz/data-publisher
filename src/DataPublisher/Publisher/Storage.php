<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher;
use League\Flysystem\Config;

class Storage extends Publisher
{
    private $storage;

    public function __construct(Publisher\Configuration\Storage $configuration)
    {
        parent::__construct($configuration);
        $this->storage = $this->configuration->getStorage();
    }

    public function publish($content)
    {
        try {
            $this->storage->write($this->configuration->getFilePath(), $content, new Config());
        } catch (FileExistsException $e) {
            $this->storage->update($this->configuration->getFilePath(), $content, new Config());
        }

    }
}