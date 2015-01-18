<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use League\Flysystem\Filesystem as FilesystemStorage;
use League\Flysystem\Adapter\AbstractAdapter;

class Filesystem implements AbstractConfiguration
{
    protected $filesystem;
    protected $path;

    public function __construct(AbstractAdapter $adapter, $path)
    {
        $this->storage = new FilesystemStorage($adapter);
        $this->path = $path;
    }

    public function getStorage()
    {
        return $this->storage;
    }

    public function getFilePath()
    {
        return $this->path;
    }

}
