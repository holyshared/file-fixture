<?php

namespace holyshared\fixture\file\processor;

use holyshared\fixture\file\FixtureProcessor;
use League\CLImate\CLImate;
use League\CLImate\Util\Output;
use League\CLImate\Util\Writer\WriterInterface;


class ArtProcessor implements FixtureProcessor, WriterInterface
{

    private $content = '';
    private $processor;

    public function __construct(FixtureProcessor $processor)
    {
        $output = new Output($this);
        $output->sameLine();

        $this->cli = new CLImate();
        $this->cli->setOutput($output);
        $this->processor = $processor;
    }

    public function load($path, array $arguments = [])
    {
        $content = $this->processor->load($path, $arguments);
        $this->cli->out($content);
        return $this->content;
    }

    public function write($content)
    {
        $this->content .= $content;
    }

}
