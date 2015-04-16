<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\loader;

use holyshared\fixture\FixtureLoader;
use League\CLImate\CLImate;
use League\CLImate\Util\Output;


final class ArtLoader implements FixtureLoader
{

    private $cli;
    private $output;
    private $loader;

    public function getName()
    {
        return 'art';
    }

    public function __construct(FixtureLoader $loader)
    {
        $this->output = new Output();
        $this->output->sameLine();
        $this->output->defaultTo('buffer');

        $this->cli = new CLImate();
        $this->cli->setOutput($this->output);
        $this->loader = $loader;
    }

    public function load($path, array $arguments = [])
    {
        $content = $this->loader->load($path, $arguments);
        $this->cli->out($content);

        $bufferWriter = $this->output->get('buffer');
        return $bufferWriter->get();
    }

}
