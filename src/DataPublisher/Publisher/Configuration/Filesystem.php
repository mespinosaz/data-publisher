<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use League\Flysystem\FilesystemInterface;

class Filesystem extends AbstractConfiguration
{
    /**
     * @var \League\Flysystem\Filesystem $storage
     */
    protected $storage;

    /**
     * @var string $path
     */
    protected $path;

    /**
     * @param \League\Flysystem\Adapter\AbstractAdapter $storage
     */
    public function __construct(FilesystemInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return \League\Flysystem\Filesystem
     */
    public function getStorage()
    {
        return $this->storage;
    }
}
