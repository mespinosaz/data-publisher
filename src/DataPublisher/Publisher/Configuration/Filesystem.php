<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use League\Flysystem\Filesystem as FilesystemStorage;
use League\Flysystem\Adapter\AbstractAdapter;

class Filesystem extends AbstractConfiguration
{
    /**
     * @var League\Flysystem\Filesystem $storage
     */
    protected $storage;

    /**
     * @var string $path
     */
    protected $path;

    /**
     * @param League\Flysystem\Adapter\AbstractAdapter $adapter
     * @param string $path
     */
    public function __construct(AbstractAdapter $adapter, $path)
    {
        $this->storage = new FilesystemStorage($adapter);
        $this->path = $path;
    }

    /**
     * @return League\Flysystem\Filesystem
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->path;
    }

}
