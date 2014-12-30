<?php

namespace mespinosaz\DataPublisher\Publisher\Configuration;

use mespinosaz\DataPublisher\Publisher\Configuration;

class File implements Configuration
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }
}