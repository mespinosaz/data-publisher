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
        $path = $this->configuration->getFilePath();
        $config = new Config();
        try {
            return $this->storage->write($path, $content, $config);
        } catch (FileExistsException $e) {
            return $this->storage->update($path, $content, $config);
        }
    }
}