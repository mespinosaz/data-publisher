<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher\Configuration\Null as Configuration;

class Printer extends AbstractPublisher
{
    public function __construct()
    {
        $this->setupConfiguration(new Configuration());
    }

    public function publish($content)
    {
        echo print_r($content, true);
        return true;
    }
}
