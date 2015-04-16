<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\file\processor;

use holyshared\fixture\file\FixtureProcessor;
use League\CLImate\CLImate;
use League\CLImate\Util\Output;


class ArtProcessor implements FixtureProcessor
{

    private $cli;
    private $output;
    private $processor;

    public function getName()
    {
        return 'art';
    }

    public function __construct(FixtureProcessor $processor)
    {
        $this->output = new Output();
        $this->output->sameLine();
        $this->output->defaultTo('buffer');

        $this->cli = new CLImate();
        $this->cli->setOutput($this->output);
        $this->processor = $processor;
    }

    public function load($path, array $arguments = [])
    {
        $content = $this->processor->load($path, $arguments);
        $this->cli->out($content);

        $bufferWriter = $this->output->get('buffer');
        return $bufferWriter->get();
    }

}
