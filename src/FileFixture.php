<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture;

use holyshared\fixture\container\LoaderContainer;
use holyshared\fixture\loader\FileLoader;
use holyshared\fixture\loader\TemplateLoader;
use holyshared\fixture\loader\ArtLoader;
use Yosymfony\Toml\Toml;


class FileFixture implements Loadable
{

    private $loaders;
    private $container;

    public function __construct(FixtureContainer $container)
    {
        $static = new FileLoader();
        $template = new TemplateLoader($static);
        $art = new ArtLoader($template);

        $this->container = $container;
        $this->loaders = new LoaderContainer([
            'static' => $static,
            'template' => $template,
            'art' => $art
        ]);
    }

    /**
     * $loader = new FileFixture();
     * $fixture = $loader->load('art.loader.success', [ 'name' => 'foo' ]);
     */
    public function load($name, array $arguments = [])
    {
        $parts = explode(':', $name);
        $loader = array_shift($parts);
        $namespace = implode($parts, ':');

        $path = $this->container->get($name);
        $loader = $this->loaders->get($loader);
        return $loader->load($path, $arguments);
    }

    public function registerProcessor(FixtureLoader $loader)
    {
        $this->loaders->register($loader);
        return $this;
    }

}
