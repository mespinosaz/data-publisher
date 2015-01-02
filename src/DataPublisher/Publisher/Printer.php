<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher;

class Printer extends Publisher
{
    public function __construct()
    {
        $this->setupConfiguration(new Publisher\Configuration\Null());
    }

    public function publish($content)
    {
        echo print_r($content, true);
        return true;
    }
}