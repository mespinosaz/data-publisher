<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use mespinosaz\DataPublisher\Publisher\Configuration;

abstract class Storage implements Configuration
{
    protected $storage;
    protected $path;

    public function getStorage()
    {
        return $this->storage;
    }

    public function getFilePath()
    {
        return $this->path;
    }

}