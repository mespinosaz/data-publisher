<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use mespinosaz\DataPublisher\Publisher\Configuration;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\AbstractAdapter;

class Storage implements Configuration
{
    protected $storage;
    protected $path;

    public function __construct(AbstractAdapter $adapter, $path)
    {
        $this->storage = new Filesystem($adapter);
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