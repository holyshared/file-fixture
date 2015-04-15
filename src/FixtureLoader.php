<?php

namespace holyshared\fixture\file;

use holyshared\fixture\file\processor\FileProcessor;
use holyshared\fixture\file\processor\TemplateProcessor;
use holyshared\fixture\file\processor\ArtProcessor;


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
        $this->processors = [
            'static' => $static,
            'template' => $template,
            'art' => $art
        ];
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

        $processor = $this->processors[$processor];
        return $processor->load($path, $arguments);
    }

}
