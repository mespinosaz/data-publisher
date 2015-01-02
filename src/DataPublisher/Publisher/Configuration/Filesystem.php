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
        $this->filesystem = new FilesystemStorage($adapter);
        $this->path = $path;
    }

    public function getFilesystem()
    {
        return $this->filesystem;
    }

    public function getFilePath()
    {
        return $this->path;
    }

}