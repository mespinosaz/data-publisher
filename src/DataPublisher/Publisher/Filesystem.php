<?php

namespace mespinosaz\DataPublisher\Publisher;

use League\Flysystem\Config;
use mespinosaz\DataPublisher\Publisher\Configuration\Filesystem as FilesystemConfiguration;

class Filesystem extends AbstractPublisher
{
    private $filesystem;

    public function __construct(FilesystemConfiguration $configuration)
    {
        parent::__construct($configuration);
        $this->filesystem = $this->configuration->getFilesystem();
    }

    public function publish($content)
    {
        $path = $this->configuration->getFilePath();
        $config = new Config();
        try {
            return $this->filesystem->write($path, $content, $config);
        } catch (FileExistsException $e) {
            return $this->filesystem->update($path, $content, $config);
        }
    }
}