<?php

namespace mespinosaz\DataPublisher\Publisher;

use League\Flysystem\Config;
use League\Flysystem\FileExistsException;
use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as FilesystemConfiguration;

class Filesystem extends AbstractPublisher
{
    /**
     * @var \League\Flysystem\Filesystem $storage
     */
    private $storage;

    public function __construct(FilesystemConfiguration $configuration)
    {
        parent::__construct($configuration);
        $this->storage = $this->configuration->getStorage();
    }

    /**
     * @param string $content
     * @param string $path
     * @return bool
     * @throws \InvalidArgumentException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function publish($content, $path = '')
    {
        if (empty($path)) {
            throw new \InvalidArgumentException('Path is mandatory!');
        }
        $config = new Config();
        try {
            return $this->storage->write($path, $content, $config);
        } catch (FileExistsException $e) {
            return $this->storage->update($path, $content, $config);
        }
    }
}
