<?php

namespace holyshared\fixture\file\filetype;

use holyshared\fixture\file\FileLoadable;
use holyshared\fixture\file\FixtureFile;
use League\CLImate\CLImate;
use League\CLImate\Util\Output;
use League\CLImate\Util\Writer\WriterInterface;


final class ArtFile extends FixtureFile implements FileLoadable, WriterInterface
{
    public function load(array $arguments = [])
    {
        $cli = new CLImate();
        $cli->setOutput(new Output($this));
        $cli->out(trim(file_get_contents($this->getPath())));
        return $this->content;
    }

    public function write($content)
    {
        $this->content .= $content;
    }

}
