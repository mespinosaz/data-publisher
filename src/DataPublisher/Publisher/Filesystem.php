<?php

namespace mespinosaz\DataPublisher\Publisher;

use League\Flysystem\Config;
use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as FilesystemConfiguration;

class Filesystem extends AbstractPublisher
{
    /**
     * @var League\Flysystem\Filesystem $storage
     */
    private $storage;

    /**
     * @param FilesystemConfiguration $configuration
     */
    public function __construct(FilesystemConfiguration $configuration)
    {
        parent::__construct($configuration);
        $this->storage = $this->configuration->getStorage();
    }

    /**
     * @param string $content
     */
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
