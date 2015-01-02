<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use mespinosaz\DataPublisher\Publisher\Configuration;
use League\Flysystem\Filesystem as FilesystemStorage;
use League\Flysystem\Adapter\Local as Adapter;

class Filesystem extends Storage
{
    public function __construct($path)
    {
        $this->storage = new FilesystemStorage(new Adapter('/'));
        $this->path = $path;
    }

}