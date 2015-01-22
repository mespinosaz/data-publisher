<?php

namespace mespinosaz\DataPublisher\Publisher;

use mespinosaz\DataPublisher\Publisher\Configuration\Null as Configuration;

class Mirror extends AbstractPublisher
{
    public function __construct()
    {
        $this->setupConfiguration(new Configuration());
    }

    /**
     * @param string $content
     */
    public function publish($content)
    {
        return $content;
    }
}
