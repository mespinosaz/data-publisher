<?php

namespace mespinosaz\DataPublisher\Publisher;

class Printer extends AbstractPublisher
{
    public function __construct()
    {
        $this->setupConfiguration(new Configuration\Null());
    }

    public function publish($content)
    {
        echo print_r($content, true);
        return true;
    }
}