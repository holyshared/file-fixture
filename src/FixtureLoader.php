<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\file;

use holyshared\fixture\file\container\ProcessorContainer;
use holyshared\fixture\file\processor\FileProcessor;
use holyshared\fixture\file\processor\TemplateProcessor;
use holyshared\fixture\file\processor\ArtProcessor;
use Yosymfony\Toml\Toml;


class FixtureLoader implements Loadable
{

    private $container;
    private $processors;

    public function __construct(FixtureContainer $container)
    {
        $static = new FileProcessor();
        $template = new TemplateProcessor($static);
        $art = new ArtProcessor($template);

        $this->container = $container;
        $this->processors = new ProcessorContainer([
            'static' => $static,
            'template' => $template,
            'art' => $art
        ]);
    }

    /**
     * $loader = new FixtureLoader();
     * $fixture = $loader->load('art.loader.success', [ 'name' => 'foo' ]);
     */
    public function load($name, array $arguments = [])
    {
        $parts = explode(':', $name);
        $processor = array_shift($parts);
        $namespace = implode($parts, ':');

        $path = $this->container->get($name);
        $processor = $this->processors->get($processor);
        return $processor->load($path, $arguments);
    }

}
