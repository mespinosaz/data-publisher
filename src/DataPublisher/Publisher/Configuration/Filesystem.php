<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use League\Flysystem\Filesystem as FilesystemStorage;
use League\Flysystem\Adapter\AbstractAdapter;

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
     * @param \League\Flysystem\Adapter\AbstractAdapter $adapter
     */
    public function __construct(AbstractAdapter $adapter)
    {
        $this->storage = new FilesystemStorage($adapter);
    }

    /**
     * @param FilesystemStorage $storage
     */
    public function setStorage(FilesystemStorage $storage)
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
