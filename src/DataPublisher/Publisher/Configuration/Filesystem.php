<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use mespinosaz\DataPublisher\Publisher\Configuration;
use League\Flysystem\Filesystem as FilesystemStorage;
use League\Flysystem\Adapter\Local as Adapter;

class Filesystem extends Storage
{
    const ROOT_PATH = '/';

    public function __construct($path)
    {
        $this->storage = new FilesystemStorage(new Adapter(self::ROOT_PATH));
        $this->path = $path;
    }

}